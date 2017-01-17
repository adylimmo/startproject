import React, { Component } from 'react';
import {
  AppRegistry,
  StyleSheet,
  View,
  PixelRatio,
  TouchableOpacity,
  Image,
  Platform,
  TextInput
} from 'react-native';
import { Container, Content, Card, CardItem, Thumbnail, List, ListItem, Radio, Text, Button, Icon, InputGroup, Input } from 'native-base';
import { Actions } from 'react-native-router-flux';
import ImagePicker from 'react-native-image-picker';

import CompPost from './CompExe/CompPost';
import CompUpload from './CompExe/CompUpload';
import CompFormdata from './CompExe/CompFormdata';
import CustomButton from './CompExe/CustomButton';


export default class Camera extends React.Component {
  constructor(props) {
    super(props);
    this.state = { 
      text: 'Useless Placeholder', 
      filename: null,
      filepath: null,
      filetype: null,
      uri: null,
      statusUpload : null,
      select:[
              {
                id:1, 
                content:{name : "Asli", status : true}
              },
              {
                id:2, 
                content:{name : "Palsu", status : false}
              },
            ],
    };
  }

  state = {
    avatarSource: null,
    videoSource: null
  };


  selectRadio(i){
    let genrateData = [];
    let statusData = false;
    let objData = [];
    {this.state.select.map(
      (radio, keys) => 
      {    
        if (radio.id == i) {
          statusData = true;
        }else{
          statusData = false;
          this.setState({ text:radio.content.name })
        }
        objData = 
              {
                id:radio.id, 
                content:{name : radio.content.name, status : statusData}
              };
        genrateData.push(objData);
      }
    )}
    this.setState({ select:genrateData });
  }

  selectPhotoTapped() {
    const options = {
      quality: 1.0,
      maxWidth: 500,
      maxHeight: 500,
      storageOptions: {
        skipBackup: true
      }
    };

    ImagePicker.showImagePicker(options, (response) => {
      console.log('Response = ', response);
       this.setState({
          name: response.fileName,
          filename: response.fileName,
          filepath: response.path,
          filetype: response.type,
          uri: response.uri,
        });
      if (response.didCancel) {
        console.log('User cancelled photo picker');
      }
      else if (response.error) {
        console.log('ImagePicker Error: ', response.error);
      }
      else if (response.customButton) {
        console.log('User tapped custom button: ', response.customButton);
      }
      else {
        var source;

        // You can display the image using either:
        //source = {uri: 'data:image/jpeg;base64,' + response.data, isStatic: true};

        //Or:
        if (Platform.OS === 'android') {
          source = { uri: response.uri, isStatic: true };
        } else {
          source = { uri: response.uri.replace('file://', ''), isStatic: true };
        }

        this.setState({
          avatarSource: source
        });
      }
    });
  }

  selectVideoTapped() {
    const options = {
      title: 'Video Picker',
      takePhotoButtonTitle: 'Take Video...',
      mediaType: 'video',
      videoQuality: 'medium'
    };

    ImagePicker.showImagePicker(options, (response) => {
      console.log('Response = ', response);

      if (response.didCancel) {
        console.log('User cancelled video picker');
      }
      else if (response.error) {
        console.log('ImagePicker Error: ', response.error);
      }
      else if (response.customButton) {
        console.log('User tapped custom button: ', response.customButton);
      }
      else {
        this.setState({
          videoSource: response.uri
        });
      }
    }); 
  }

  viewLayout(typeReport){
    if ( typeReport == "text" ) {
      return(
          <Card style={{ flex: 0 }}>
          <CardItem>
            <Text style={{ fontSize: 20 }}>{ this.props.treport.activity_title }</Text>
            <Text note>{ this.props.treport.activity_description }</Text>
          </CardItem>
          <CardItem>
            <InputGroup>
              <Input inlineLabel label="" placeholder="Silahkan Isi" onChangeText={(text) => this.setState({text})}/>
            </InputGroup>
          </CardItem>
        </Card>
        )
    }

    if ( typeReport == "file" ) {
      return(
        <Card style={{ flex: 0 }}>
          <CardItem>
            <Text style={{ fontSize: 20 }}>{ this.props.treport.activity_title }</Text>
            <Text note>{ this.props.treport.activity_description }</Text>
          </CardItem>
          <CardItem>
            <TouchableOpacity onPress={this.selectPhotoTapped.bind(this)}>
              <View style={[styles.avatar, styles.avatarContainer, { marginBottom: 20 }]}>
                {this.state.avatarSource === null ? <Text>Select a Photo</Text> :
                  <Image style={styles.avatar} source={this.state.avatarSource} />
                }
              </View>
            </TouchableOpacity>
          </CardItem>
        </Card>
      )
    }

    if ( typeReport == "radio" ) {
      return(
        <Card style={{ flex: 0 }}>
          <CardItem>
            <Text style={{ fontSize: 20 }}>{ this.props.treport.activity_title }</Text>
            <Text note>{ this.props.treport.activity_description }</Text>
          </CardItem>
          <CardItem>
            <List>
            {this.state.select.map((radio, i) => (
              <ListItem key={i}>
                <Radio selected={ radio.content.status } onPress={() => this.selectRadio(radio.id) } />
                <Text>{ radio.content.name }</Text>
              </ListItem>
            ))}
            </List>
          </CardItem>
        </Card>
      )
    } 
  }

  sendData(act) {
  // console.log("text1 :");

    if (act == "file") {
        let photo = { uri: this.state.avatarSource.uri}
        let formdata = new FormData();

        formdata.append("image", {uri: photo.uri, name: this.state.filename, type: 'multipart/form-data'});
        CompFormdata.setRestURL("http://202.158.39.170/salesforce/public/imageupload");
        CompFormdata.setSendData(formdata);
        CompFormdata.send((callback) => {


            CompPost.setMethod("POST");
            CompPost.setSendData({assigment_id : 1, sales_id : 1, task_id : 1, ativity_id : 1, report_title : this.state.filename });
            CompPost.setResource("/reports")
            CompPost.send(() => {
                // Nothing to do
              // console.log(this.state.text);
              alert("Anda telah berhasil upload!");
            });

        });

    }else{   

      console.log("text2 :");
      console.log("text :",this.state.text);
      CompPost.setMethod("POST");
      CompPost.setSendData({assigment_id : 1, sales_id : 1, task_id : 1, ativity_id : 1, report_title : this.state.text });
      CompPost.setResource("/reports")
      CompPost.send(() => {
          // Nothing to do
        // console.log(this.state.text);
        alert('Data Telah Di Kirim');
      });
    }
  }


  render() {
    return (
      <Container>
        <Content style={{ margin: 10 }}>

          { this.viewLayout(this.props.treport.type_report ) }

          <Button style={{ alignSelf: 'center', marginTop: 20, marginBottom: 20 }} onPress={ () => this.sendData( this.props.treport.type_report ) }>
            Submit
          </Button>

        </Content>
      </Container>
    );
  }

}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#F5FCFF'
  },
  avatarContainer: {
    borderColor: '#9B9B9B',
    borderWidth: 1 / PixelRatio.get(),
    justifyContent: 'center',
    alignItems: 'center'
  },
  avatar: {
    width: 300,
    height: 300,
    alignItems: 'center',
    justifyContent: 'center'
  }
});