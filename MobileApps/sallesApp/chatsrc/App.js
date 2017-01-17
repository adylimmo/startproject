import React from 'react';
import {
  Platform,
} from 'react-native';

import { Router, Scene } from 'react-native-router-flux';
import Home from './components/Home';
import Chat from './components/Chat';
import Maps from './components/MapsCompo';
import Notif from '../app';
import ComponentImagePicker from '../ComponentImagePicker';
import CustomMap from '../CustomMap';
import GeolocationExample from '../GeolocationExample';
import TasksComponent from '../sales/TasksComponent';
import DetailTask from '../sales/DetailTask';
import PageTaskLoc from './PageTaskLocDetail';
export default class App extends React.Component {
  render() {
    return (
      <Router>
        <Scene key='root' style={{ paddingTop: Platform.OS === 'ios' ? 64 : 54 }}>
          <Scene key='GeolocationExample' title='Sales Force' component={GeolocationExample} />
          <Scene key='home' title='Home' component={Home} />
          <Scene key='CustomMap' title='Sales Force' component={CustomMap} />
          <Scene key='Notif' title='Notif' component={Notif} />
          <Scene key='chat' title='Chat' component={Chat} />
          <Scene key='Maps' title='Maps' component={Maps} />
          <Scene key='DetailTask' title='Task Detail' component={DetailTask} />
          <Scene key='TasksComponent' title='Tasks List' component={TasksComponent} />
          <Scene key='ComponentImagePicker' title='Galery' component={ComponentImagePicker} />
        </Scene>
      </Router>
    );
  }
}
