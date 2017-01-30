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
export default class tagihan extends Component {

    state = {
        listBilling: false,
        isLoading: true,
    };
    billingRows = [];
    customerID = 1;

    constructor(props){
        super(props);
        this.LoadList();
    }

    componentDidMount()
    {
        // alert('tes');
    }

    LoadList(){
        ComFetch.setResource('/assigments?search=customer_id:' + this.customerID);
        ComFetch.sendFetch((response) => {
            console.log('tagihan', response);
            if (typeof response.success != 'undefined' && response.success) {
                this.setState({listBilling: response.data, isLoading: false});
            }
            else {
                this.setState({isLoading: false});
            }
        });
        return;
    }

    BuildList(){
        if (this.state.listBilling === false && this.state.isLoading) {
            return (
                <Spinner />
            );
        }
        else if (this.state.listBilling === false && !this.state.isLoading) {
            return (
                <Text>
                    Error Fetching data
                </Text>
            );
        }
        else {
            // console.log(this.state.listBilling);
            for (var i in this.state.listBilling) {
                if (this.state.listBilling.hasOwnProperty(i)) {
                    let billing = this.state.listBilling[i];
                    this.billingRows.push(
                        <View key={billing.assigment_id} style={styles.listBilling}>
                            <View>
                                <Text>
                                    Due assigment date: {billing.assigment_date}
                                </Text>
                                <Text>
                                    Sales: {billing.sales.sales_name}
                                </Text>
                            </View>
                            <View>
                                <Text>
                                    Status: {billing.status}
                                </Text>
                            </View>
                            <View>
                                <Button block key={billing.assigment_id} style={styles.listBillingDetail} onPress={() => Actions.TagihanDetail({assignment_id: billing.assigment_id})}>
                                    Detail
                                </Button>
                            </View>
                        </View>
                    );
                }
            }
            return this.billingRows;
        }
    }

    render() {
        return (
            <Container>
                <Content>
                    <View>
                        {this.BuildList()}
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
    listBilling: {
        padding: 5,
        backgroundColor: '#dddddd',
        margin: 5,
    },
    listBillingDetail: {
        marginTop: 10,
    },
});
