 import React, { Component } from 'react';
 import {
  AppRegistry,
  StyleSheet,
  Text,
  View,
  Image,
  TouchableOpacity,
  Platform,
  PixelRatio
} from 'react-native';
var MapView = require('react-native-maps');
import ImagePicker from 'react-native-image-picker';
import { Button, List, Container, Content, ListItem, Card, CardItem, Radio, InputGroup, Input, Icon, Picker } from 'native-base';
import { Actions } from 'react-native-router-flux';
exports.framework = 'React';
exports.title = 'Geolocation';
exports.description = 'Examples of using the Geolocation API.';

exports.examples = [
  {
    title: 'navigator.geolocation',
    render: function(): React.Element<any> {
      return <DetailTask />;
    },
  }
];

export default class DetailTask extends Component {
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
          source = {uri: response.uri, isStatic: true};
        } else {
          source = {uri: response.uri.replace('file://', ''), isStatic: true};
        }

        this.setState({
          avatarSource: source
        });
      }
    });
  }
  state = {
    avatarSource: null,
    initialPosition: 'unknown',
    lastPosition: 'unknown',
  };

  watchID: ?number = null;

  componentDidMount() {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        var initialPosition = JSON.stringify(position);
        this.setState({initialPosition});
      },
      (error) => alert(JSON.stringify(error)),
      {enableHighAccuracy: true, timeout: 20000, maximumAge: 1000}
    );
    this.watchID = navigator.geolocation.watchPosition((position) => {
      var lastPosition = JSON.stringify(position);
      this.setState({lastPosition});
    });
  }

  componentWillUnmount() {
    navigator.geolocation.clearWatch(this.watchID);
  }

  render() {
    return (
      <Container>
                <Content>
                    <Card style={{ flex: 0 }}>
                        <CardItem>
                            <Text style={{fontSize:20}}>1. Terima Uang</Text>
                            <Text note>Descripsi</Text>
                        </CardItem>


                        <CardItem>
                            <InputGroup>
                                <Input inlineLabel label="Rp." placeholder="Rp. 0" />
                            </InputGroup>                   
                        </CardItem>
                   </Card>
                    <Card style={{ flex: 0 }}>
                        <CardItem>
                            <Text style={{fontSize:20}}>2. Ambil Foto</Text>
                            <Text note>Descripsi</Text>
                        </CardItem>


                        <CardItem style={{height:300}}>
                            <TouchableOpacity onPress={this.selectPhotoTapped.bind(this)}>
          <View style={[styles.avatar, styles.avatarContainer, {marginBottom: 20}]}>
          { this.state.avatarSource === null ? <Text>Select a Photo</Text> :
            <Image style={styles.avatar} source={this.state.avatarSource} />
          }
          </View>
        </TouchableOpacity>               
                        </CardItem>
                   </Card>
                   <Card style={{ flex: 0 }}>
                        <CardItem>
                            <Text style={{fontSize:20}}>3. Cek Keaslian</Text>
                            <Text note>Descripsi</Text>
                        </CardItem>


                        <CardItem>
                                     <ListItem>
                            <Radio selected={false} />
                            <Text>Asli</Text>
                        </ListItem>
                        <ListItem>
                            <Radio selected={true} />
                            <Text>Palsu</Text>
                        </ListItem>         
                        </CardItem>
                   </Card>
                   <Button style={{ alignSelf: 'center', marginTop: 20, marginBottom: 20 }}>
                        Submit
                    </Button>
                </Content>
            </Container>
                    
     
    );
  }
}

var styles = StyleSheet.create({
  title: {
    fontWeight: '500',
  },
   avatarContainer: {
     height:400,
    borderColor: '#9B9B9B',
    borderWidth: 1 / PixelRatio.get(),
    justifyContent: 'center',
    alignItems: 'center'
  },
  avatar: {
    borderRadius: 75,
    width: 150,
    height: 150
  }
});