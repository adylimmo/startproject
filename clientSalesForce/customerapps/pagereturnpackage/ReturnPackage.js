// Impor dependencies
import React, { Component } from 'react';
import {
  StyleSheet,
  Text,
  View,
  PixelRatio,
  TouchableOpacity,
  Image,
  Platform,
  AppState
} from 'react-native';
import { Container, Content, Footer, FooterTab, Button, Icon, Badge, Spinner } from 'native-base';
import { Actions } from 'react-native-router-flux';

// Import komponen buatan
import ComFetch from '../ComFetch';

// Kelas utama
export default class returnPackage extends Component {

    state = {};

    constructor(props){
        super(props);

        // Koneksi dengan server ws
        // ws = new WebSocket('ws://localhost:2000');
        // ws.onopen = () => {
        //     console.log('Connection Established');
        // }
        //
        // ws.onmessage = (e) => {
        //     console.log(e);
        // }
        //
        // ws.onerror = (e) => {
        //     console.log(e);
        // }
        //
        // ws.onclose = (e) => {
        //     console.log(e);
        // }
    }

    render(){
        return(
            <Container>
                <Content>
                    <View>
                        <Text>
                            Hallo World
                        </Text>
                    </View>
                </Content>
            </Container>
        );
    }
}

const styles = StyleSheet.create({
    panel: {
        margin: 8,
        padding: 5,
        backgroundColor: '#eeeeee',
    },
    panelTitle: {
        fontSize: 20,
        textAlign: 'center',
        margin: 10,
    },
    instructions: {
        color: '#333333',
        marginBottom: 5,
    },
});
