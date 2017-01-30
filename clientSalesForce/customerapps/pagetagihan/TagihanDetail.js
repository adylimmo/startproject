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
  AppState,
} from 'react-native';
import { Container, Content, Footer, FooterTab, Button, Badge, Spinner, InputGroup, Input, Icon } from 'native-base';
import { Actions } from 'react-native-router-flux';

// Ambil Inisialisasi firebase
import firebaseInit from '../firebaseInit';

// Import komponen buatan
import ComFetch from '../ComFetch';
import ComPostConfirm from '../ComFetch';

// Kelas utama
export default class tagihanDetail extends Component {

    state = {
        billingDetail: false,
        isLoading: true,
        userText: '',
        confirmStatus: 0, // 0: belom loading, 1: loading, 2: Success
    }
    customerID = 1;

    confirm_table = null;

    constructor(props){
        super(props);
        // console.log('props', props);
        this.LoadList();

        this.confirm_table = firebaseInit.database().ref("confirm_table");
    }

    LoadList(){
        assignment_id = this.props.assignment_id;
        ComFetch.setResource('/assigments/' + assignment_id);
        ComFetch.sendFetch((response) => {
            console.log('TagihanDetail', response);
            if (typeof response.success != 'undefined' && response.success) {
                this.setState({billingDetail: response.data, isLoading: false});
            }
            else {
                this.setState({isLoading: false});
            }
        });
        return;
    }

    _btnRender()
    {
        if (this.state.confirmStatus == 0) {
            return (
                <Button block onPress={() => this.confirm({assignment_id: this.props.assignment_id, userText: this.state.userText})}>
                    Confirm Payment
                </Button>
            );
        }
        else if (this.state.confirmStatus == 1) {
            return (
                <Button block disabled>
                    Loading
                </Button>
            );
        }
        else {
            return (
                <Button block success>
                    Success
                </Button>
            );
        }
    }

    _preRender(){
        if (this.state.billingDetail === false && this.state.isLoading) {
            return (
                <Spinner />
            );
        }
        else if (this.state.billingDetail === false && !this.state.isLoading) {
            return (
                <View>
                    <Text>
                        Error Fetching data
                    </Text>
                </View>
            );
        }
        else {
            let detailBilling = this.state.billingDetail;

            return (
                <View>
                    <View style={styles.panel}>
                        <Text style={styles.panelTitle}>
                            Task Detail
                        </Text>
                        <Text style={styles.instructions}>
                            Title : {detailBilling.task.task_title}
                        </Text>
                        <Text style={styles.instructions}>
                            Description : {detailBilling.task.task_description}
                        </Text>
                        <Text style={styles.instructions}>
                            Created at : {detailBilling.task.created_at}
                        </Text>
                    </View>
                    <View style={styles.panel}>
                        <Text style={styles.panelTitle}>
                            Sales Detail
                        </Text>
                        <Text style={styles.instructions}>
                            Sales Name : {detailBilling.sales.sales_name}
                        </Text>
                        <Text style={styles.instructions}>
                            Sales ID : {detailBilling.sales.sales_id}
                        </Text>
                    </View>
                    <View style={styles.panel}>
                        <Text style={styles.panelTitle}>
                            Your Detail
                        </Text>
                        <Text style={styles.instructions}>
                            Your Name : {detailBilling.customer.customer_name}
                        </Text>
                        <Text style={styles.instructions}>
                            Your ID : {detailBilling.customer.customer_id}
                        </Text>
                        <Text style={styles.instructions}>
                            Your Address : {detailBilling.customer.customer_address}
                        </Text>
                    </View>
                    <View style={styles.panel}>
                        <InputGroup borderType='rounded' >
                            <Icon name='ios-text' />
                            <Input placeholder='Type your text here' onChangeText={(teks) => this.setState({userText: teks})}/>
                        </InputGroup>
                        {this._btnRender()}
                    </View>
                </View>
            );
        }
    }

    render() {
        return (
            <Container>
                <Content>
                    {this._preRender()}
                </Content>
            </Container>
        );
    }


    // Untuk konfirmasi pembayaran
    confirm(param){

        this.setState({confirmStatus: 1});

        assignment_id = param.assignment_id;
        confirmation = param.userText;
        customer_id = this.customerID;
        ComPostConfirm.setResource('/confirms');
        ComPostConfirm.setMethod('POST');
        ComPostConfirm.setSendData({customer_id: customer_id, assignment_id: assignment_id, confirmation: confirmation});
        ComPostConfirm.sendFetch((response) => {

            console.log('Confirm', response);
            if (this.confirm_table !== null) {

                this.confirm_table.push({
                    customerID: customer_id,
                    assignment_id: assignment_id,
                    confirmation: confirmation,
                });
                alert("Thank you for your confirmation");
                this.setState({confirmStatus: 2});

            }

        });
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
