/**
 * App untuk client sales force
 * https://github.com/facebook/react-native
 * @flow
 */

import React, { Component } from 'react';
import { AppRegistry, AppState, DeviceEventEmitter } from 'react-native';
import App from './customerapps/route';
import backgroundService from './customerapps/backgroundService';
// import PushNotificationAndroid from 'react-native-push-notification'

backgroundService.init();
// (function() {
//   // Register all the valid actions for notifications here and add the action handler for each action
//   PushNotificationAndroid.registerNotificationActions(['Accept','Reject','Yes','No']);
//   DeviceEventEmitter.addListener('notificationActionReceived', function(action){
//     console.log ('Notification action received: ' + action);
//     const info = JSON.parse(action.dataJSON);
//     console.log(info);
//     // Add all the required actions handlers
//   });
// })();



AppRegistry.registerComponent('clientSalesForce', () => App);
