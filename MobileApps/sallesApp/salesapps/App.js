import React from 'react';
import {
  Platform,
} from 'react-native';

import { Router, Scene } from 'react-native-router-flux';
import Home from './Home';
import Camera from './Camera';
import LoadData from './LoadData';
import CompTasklist from './CompTasklist';
import CompTrackingtask from './CompTrackingtask';
import PageTaskLoc from './PageTaskLocDetail';
import ComSendCoord from './ComSendCoord';
import ComGeolocation from './ComGeolocation';
import CustomMap from '../CustomMap';
import ComActivities from './ComActivities';



// import firebaseInit from './firebaseInit';

export default class App extends React.Component {
  constructor(props) {
        super(props);

        // this.ref = firebaseInit.database().ref();
        // this.ref.on(
        //     "value",
        //     function(tes){

        //         console.log(tes.val());

        //     },
        //     function(error){
        //         console.log('error: '+ error);
        //     }
        // );

        // Tambahkan interval untuk pengiriman kordinat device ke restAPI jenjang 5 menit
        // setTimeout(() => {        
        //   ComGeolocation.currentPosition((pos) => {
        //       console.log('currentPosition', pos);
        //       ComSendCoord.setMethod("POST");
        //       ComSendCoord.setSendData({sales_id: 2, geolocation_lat: pos.coords.latitude, geolocation_lng: pos.coords.longitude});
        //       ComSendCoord.sendCoord(() => {
        //           // Nothing to do
        //       });
        //   });
        // }, 10000);
        setInterval(() => {

            ComGeolocation.currentPosition((pos) => {
                console.log('currentPosition', pos);
                ComSendCoord.setMethod("POST");
                ComSendCoord.setSendData({sales_id: 2, geolocation_lat: pos.coords.latitude, geolocation_lng: pos.coords.longitude});
                ComSendCoord.sendCoord(() => {
                    // Nothing to do
                });
            });

        }, (1000 * 60) * 5);
    }
  render() {
    return (
      <Router>
        <Scene key='root' style={{ paddingTop: Platform.OS === 'ios' ? 64 : 54 }}>
          



        <Scene key='PageTaskLoc' title='Home' component={PageTaskLoc} />
        <Scene key='ComActivities' title='Activities' component={ComActivities} />
        <Scene key='CustomMap' title='CustomMap' component={CustomMap} />
          <Scene key='Home' title='Home' component={Home} />
          <Scene key='CompTrackingtask' title='CompTrackingtask' component={CompTrackingtask} />
          <Scene key='CompTasklist' title='Task list' component={CompTasklist} />
          <Scene key='Camera' title='Task Detail' component={Camera} />
        </Scene>
      </Router>
    );
  }
}
