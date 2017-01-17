import React, { Component } from 'react';
import PushNotification from 'react-native-push-notification';
var DeviceInfo = require('react-native-device-info');

console.log("Device Unique ID", DeviceInfo.getUniqueID());

console.log("Device Manufacturer", DeviceInfo.getManufacturer());  // e.g. Apple

console.log("Device Brand", DeviceInfo.getBrand());  // e.g. Apple / htc / Xiaomi

console.log("Device Model", DeviceInfo.getModel());  // e.g. iPhone 6

console.log("Device ID", DeviceInfo.getDeviceId());  // e.g. iPhone7,2 / or the board on Android e.g. goldfish

console.log("System Name", DeviceInfo.getSystemName());  // e.g. iPhone OS

console.log("System Version", DeviceInfo.getSystemVersion());  // e.g. 9.0

console.log("Bundle ID", DeviceInfo.getBundleId());  // e.g. com.learnium.mobile

console.log("Build Number", DeviceInfo.getBuildNumber());  // e.g. 89

console.log("App Version", DeviceInfo.getVersion());  // e.g. 1.1.0

console.log("App Version (Readable)", DeviceInfo.getReadableVersion());  // e.g. 1.1.0.89

console.log("Device Name", DeviceInfo.getDeviceName());  // e.g. Becca's iPhone 6

console.log("User Agent", DeviceInfo.getUserAgent()); // e.g. Dalvik/2.1.0 (Linux; U; Android 5.1; Google Nexus 4 - 5.1.0 - API 22 - 768x1280 Build/LMY47D)

console.log("Device Locale", DeviceInfo.getDeviceLocale()); // e.g en-US

console.log("Device Country", DeviceInfo.getDeviceCountry()); // e.g US

console.log("Timezone", DeviceInfo.getTimezone()); // e.g America/Mexico_City

console.log("App Instance ID", DeviceInfo.getInstanceID()); // ANDROID ONLY - see https://developers.google.com/instance-id/

console.log("App is running in emulator", DeviceInfo.isEmulator()); // if app is running in emulator return true

console.log("App is running on a tablet", DeviceInfo.isTablet()); // if app is running on a tablet return true
export default class PushController extends Component {
  componentDidMount() {
    PushNotification.configure({
      onRegister: function(token) {
        console.log( 'TOKEN:', token );
      },
      onNotification: function(notification) {
        console.log( 'NOTIFICATION:', notification );
      },

    });
  }

  render() {
    return null;
  }
}
