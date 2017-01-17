/**
 * Sample React Native App
 * https://github.com/facebook/react-native
 * @flow
 */

 import React, { Component } from 'react';
 import {
  AppRegistry,
  StyleSheet,
  Text,
  View
} from 'react-native';
import { Container, Content, Footer, FooterTab, Button, Icon, Badge } from 'native-base';
import CustomMap from './CustomMap';
import MarkerMap from './MarkerMaps';
import ComponentImagePicker from './ComponentImagePicker';
import App from './app';
import { Actions } from 'react-native-router-flux'; 
export default class DeviceInfoApps extends Component {
  render() {
    return (
      <Container>
      <Content>
      
      <CustomMap />
      
      </Content>
      <Footer >
      <FooterTab>
      <Button>
      <Badge>2</Badge>
      Apps
      <Icon name='ios-apps-outline' />
      </Button>
      <Button onPress={Actions.ComponentImagePicker}>
      Camera
      <Icon name='ios-camera-outline' />
      </Button>
      <Button active>
      Maps
      <Icon name='ios-compass' />
      </Button>
      <Button>
      Chat
      <Icon name='ios-text' />
      </Button>
      </FooterTab>
      </Footer>
      </Container>

      );
  }
}

AppRegistry.registerComponent('DeviceInfoApps', () => DeviceInfoApps);
