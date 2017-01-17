import React, { Component } from 'react';
import { View, Text, StyleSheet, Picker, AppState, Platform } from 'react-native';
import { Container, Content, Footer, FooterTab, Button, Icon, Badge } from 'native-base';
import PushController from './PushController';
import PushNotification from 'react-native-push-notification';
import { Actions } from 'react-native-router-flux';
var DeviceInfo = require('react-native-device-info');
const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#F5FCFF',
  },
  welcome: {
    fontSize: 20,
    textAlign: 'center',
    margin: 10,
  },
  picker: {
    width: 100,
  },
});

export default class App extends Component {
  constructor(props) {
    super(props);

    this.handleAppStateChange = this.handleAppStateChange.bind(this);
    this.state = {
      seconds: 5,
    };
  }

  componentDidMount() {
    AppState.addEventListener('change', this.handleAppStateChange);
  }

  componentWillUnmount() {
    AppState.removeEventListener('change', this.handleAppStateChange);
  }

  handleAppStateChange(appState) {
    if (appState === 'background') {
      let date = new Date(Date.now() + (this.state.seconds * 1000));

      if (Platform.OS === 'ios') {
        date = date.toISOString();
      }

      PushNotification.localNotificationSchedule({
        message: "My Notification Message",
        date,
      });
    }
  }

  render() {
    return (
      <Container>
        <Content>
          <View style={styles.container}>
            <Text style={styles.welcome}>
              Welcome <Text>{DeviceInfo.getModel()}</Text>
      </Text>
            <Picker
              style={styles.picker}
              selectedValue={this.state.seconds}
              onValueChange={(seconds) => this.setState({ seconds })}
              >
              <Picker.Item label="5" value={5} />
              <Picker.Item label="10" value={10} />
              <Picker.Item label="15" value={15} />
            </Picker>
            <Text>{DeviceInfo.getUniqueID()}</Text>
            <Text>{DeviceInfo.getManufacturer()}</Text>
            <Text>{DeviceInfo.getBrand()}</Text>
            <Text>{DeviceInfo.getDeviceId()}</Text>
            <Text>{DeviceInfo.getSystemName()}</Text>
            <Text>{DeviceInfo.getSystemVersion()}</Text>
            <Text>{DeviceInfo.getBundleId()}</Text>
            <Text>{DeviceInfo.getBuildNumber()}</Text>
            <Text>{DeviceInfo.getVersion()}</Text>
            <Text>{DeviceInfo.getReadableVersion()}</Text>
            <Text>{DeviceInfo.getDeviceName()}</Text>
            <Text>{DeviceInfo.getUserAgent()}</Text>
            <Text>{DeviceInfo.getDeviceLocale()}</Text>
            <Text>{DeviceInfo.getTimezone()}</Text>
            <PushController />
          </View>
        </Content>
        <Footer style={{ backgroundColor: 'black' }}>
          <FooterTab>
            <Button onPress={Actions.CustomMap}>
              Apps
      <Icon name='ios-apps-outline' />
            </Button>
            <Button onPress={Actions.ComponentImagePicker}>
              Camera
      <Icon name='ios-camera-outline' />
            </Button>
            <Button onPress={Actions.Maps} active>
              Maps
      <Icon name='ios-compass' />
            </Button>
            <Button onPress={Actions.home}>
              Chat
      <Icon name='ios-text' />
            </Button>
            <Button onPress={Actions.GeolocationExample}>
              Home
      <Icon name='ios-home' />
            </Button>
          </FooterTab>
        </Footer>
      </Container>
    );
  }
}
