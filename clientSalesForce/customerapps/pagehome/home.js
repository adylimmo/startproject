// Impor dependencies
import React, { Component } from 'react';
import {
  AppRegistry,
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

// Ambil Inisialisasi firebase
import firebaseInit from '../firebaseInit';

// Import komponen buatan
import ComFetch from '../ComFetch';

// Kelas utama
export default class home extends Component {

    state = {
        totalBilling: false,
        firebaseApp: null,
    }
    ref = null;

    constructor(props) {
        super(props);
        customerID = 1;
        ComFetch.setResource('/assigments?search=customer_id:' + customerID);
        ComFetch.sendFetch((response) => {
            console.log('home.js response dari restfull api', response);
            if (typeof response.success != 'undefined' && response.success) {
                this.setState({totalBilling: response.data.length});
            }
        });

        // this.ref = firebaseInit.database().ref('tasks');
        // this.ref.on(
        //     "value",
        //     function(tes){
        //         console.log('home.js cb dari firebase', tes.val());
        //     },
        //     function(error){
        //         console.log('error: '+ error);
        //     }
        // );

    }

    _preRenderBilling(){
        if (this.state.totalBilling === false) {
            return (
                <Spinner />
            );
        }
        else {
            return (
                <Text style={styles.yourBillTotal}>
                    {this.state.totalBilling}
                </Text>
            );
        }
    }

    render() {
        return (
            <Container>
                <Content>

                    <View style={styles.viewContMiddle}>
                        <View block style={styles.yourBill}>
                            {this._preRenderBilling()}
                            <Text style={styles.yourBillText}>
                                BILLING
                            </Text>
                        </View>
                    </View>
                    <View style={styles.viewContMiddle}>
                        <View>
                            <Button onPress={Actions.tagihan}>
                                View Billing
                            </Button>
                        </View>
                    </View>
                    <View style={styles.viewContMiddle}>
                        <View>
                            <Button onPress={Actions.returnPackage}>
                                Return Package
                            </Button>
                        </View>
                    </View>

                </Content>
            </Container>
        );
    }
}

const styles = StyleSheet.create({
    view: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
    },
    viewContMiddle: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
        marginTop: 5,
        marginBottom: 5,
    },
    yourBill: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
        borderRadius: 100,
        borderWidth: 2,
        width: 150,
        height: 150,
        marginTop: 20,
        marginBottom: 30,
    },
    yourBillTotal: {
        fontSize: 40,
        textAlign: 'center',
        margin: 10,
    },
    yourBillText: {
        textAlign: 'center',
        color: '#333333',
        marginBottom: 5,
        fontSize: 20,
    },
});
