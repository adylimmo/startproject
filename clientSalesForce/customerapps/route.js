// Impor dependencies
import React, { Component } from 'react';
import { Platform } from 'react-native';
import { Router, Scene, ActionConst } from 'react-native-router-flux';

// Impor halaman
import home from './pagehome/home';
import tagihan from './pagetagihan/tagihan';
import TagihanDetail from './pagetagihan/TagihanDetail';
import returnPackage from './pagereturnpackage/ReturnPackage';

// Kelas utama
export default class route extends Component {
    render() {
        return (
            <Router>
                <Scene key='root' style={{ paddingTop: Platform.OS === 'ios' ? 64 : 54 }}>
                <Scene key='home' title='Home' component={home} />
                    <Scene key='tagihan' title='Billing List' component={tagihan} />
                    <Scene key='TagihanDetail' title='Billing Detail' component={TagihanDetail} />
                    <Scene key='returnPackage' title='Return Package' component={returnPackage} />
                </Scene>
            </Router>
        );
    }
}
