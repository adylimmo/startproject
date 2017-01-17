import React, { Component } from 'react';
import {
  StyleSheet,
  View,
  Dimensions,
  TouchableOpacity,
  ListView
} from 'react-native';
import {
  Container,
  Header,
  Content,
  List,
  ListItem,
  Thumbnail,
  Text,
  Title,
  Button,
  Badge,
  Icon
} from 'native-base';
import { Actions } from 'react-native-router-flux';
import MapView from 'react-native-maps';

const { width, height } = Dimensions.get('window');

const ASPECT_RATIO = width / height;
const LATITUDE = -6.143098;
const LONGITUDE = 106.743128;
const LATITUDE_DELTA = 1;
const LONGITUDE_DELTA = LATITUDE_DELTA * ASPECT_RATIO;
const SPACE = 0.01;

function createMarker(modifier = 1) {
  return {
    latitude: LATITUDE - (SPACE * modifier),
    longitude: LONGITUDE - (SPACE * modifier),
  };
}



export default class CompTrackingtask extends Component {
  constructor() {
    super();
    this.state = {
      dataSource: new ListView.DataSource({
        rowHasChanged: (row1, row2) => row1 !== row2,
      }),
      loading: true,
      markers: [{
        title: 'hello',
        coordinates: {
          latitude: -6.143098,
          longitude: 106.743128
        },
      }]
    }
  }

  loadDataFromServer(id) {
    // console.log("responseJson",responseJson.data);
    fetch('http://202.158.39.170/salesforce/public/api/customers/' + id)
      .then((response) => response.json())
      .then((responseJson) => {

        var data = responseJson.data;
        var genrateMap = [];
        var objMap = [];

        // {data.map((mapData, index)=>{
        //             objMap = { 
        //                         "title": mapData.customer_name,
        //                         "coordinates": {
        //                           "latitude": Number(mapData.geolocation_lat), 
        //                           "longitude":  Number(mapData.geolocation_lng)
        //                         }
        //                       };
        //             genrateMap.push(objMap);
        //           })}

        objMap = {

          "title": data.customer_name,
          "coordinates": {
            "latitude": Number(data.geolocation_lat),
            "longitude": Number(data.geolocation_lng)
          }
        };
        genrateMap.push(objMap);


        this.setState({
          dataSource: this.state.dataSource.cloneWithRows(responseJson.data),
          loading: false,
          markers: genrateMap,
        });
        // console.log("responseJson",responseJson.data);
        // console.log("genrateMap: ", genrateMap);
        // console.log("markers: ", this.state.markers);
      })
      .catch((error) => {
        // console.error(error);
      })
      .done();
  }

  listRow(rowData) {
    return (
      <ListItem iconRight>
        <Icon name="ios-mail-outline" style={{ color: '#0A69FE' }} />
        <Text>{rowData.task.task_title}</Text>
        <Text style={{ color: '#f0f0f0', fontSize: 11 }}>{rowData.customer.customer_name} : {rowData.customer.customer_address}</Text>
      </ListItem>
    );
  }


  componentDidMount() {
    var id = this.props.id;
    this.loadDataFromServer(id);
  }

  render() {
    return (
      <View style={styles.container}>
        {this.state.loading ? (
          <View style={styles.loaded}>
            <Text>Please Wait</Text>
          </View>
        ) : (

            <MapView
              ref={ref => { this.map = ref; } }
              style={styles.map}
              showsUserLocation={true}
              followsUserLocation={true}
              showsCompass={false}
              showsPointOfInterest={false}
              region={{
                latitude: 37.78825,
                longitude: -122.4324,
                latitudeDelta: 0.0922,
                longitudeDelta: 0.0421,
               }}

              initialRegion={{
                latitude: LATITUDE,
                longitude: LONGITUDE,
                latitudeDelta: LATITUDE_DELTA,
                longitudeDelta: LONGITUDE_DELTA,

              }}
              >
              {this.state.markers.map((marker, i) => (
                <MapView.Marker
                  key={i}
                  image={require('../images/flag-blue.png')}
                  title={marker.title}
                  coordinate={marker.coordinates}
                  />
              ))}
            </MapView>

          )}
      </View>
    );
  }
}

const styles = StyleSheet.create({
  container: {
    ...StyleSheet.absoluteFillObject,
    justifyContent: 'flex-end',
    alignItems: 'center',
    flex: 1,
    marginTop: 0,
    backgroundColor: '#F5FCFF',
  },
  loaded: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#F5FCFF',
  },
  rowList: {
    marginTop: 20
  },
  rowStyle: {
    backgroundColor: '#fff',
    padding: 10,
    margin: 10,
    shadowOffset: {
      width: 1,
      height: 1,
    },
    shadowRadius: 2,
    shadowOpacity: 0.2,
    shadowColor: '#ccc',
    elevation: 1
  },
  map: {
    ...StyleSheet.absoluteFillObject,
  },
  bubble: {
    backgroundColor: 'rgba(255,255,255,0.7)',
    paddingHorizontal: 18,
    paddingVertical: 12,
    borderRadius: 20,
  },
  button: {
    marginTop: 12,
    paddingHorizontal: 12,
    alignItems: 'center',
    marginHorizontal: 10,
  },
  buttonContainer: {
    flexDirection: 'column',
    marginVertical: 20,
    backgroundColor: 'transparent',
  },
});