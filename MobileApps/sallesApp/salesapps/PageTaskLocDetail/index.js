// Import dependencies
import React, { Component } from 'react';
import { View, Text, StyleSheet, Picker, AppState, Platform } from 'react-native';
import { Container, Content, Footer, FooterTab, Button, Icon, Badge, Spinner } from 'native-base';
import ComGeolocation from '../ComGeolocation';
import ComAssignment from './ComAssignment';

import { Actions } from 'react-native-router-flux';
// Declare Style
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
    yourTask: {
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
    yourTaskText: {
        fontSize: 20,
        textAlign: 'center',
    },
    yourTaskTextStat: {
        fontSize: 40,
        textAlign: 'center',
    },
    viewTask: {
        marginTop: 15,
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
    },
});


export default class PageTaskLocDetail extends Component {

    state = {
        currLat : 'loading',
        currLong : 'loading',
        totalAssignment : false,
    };

    constructor(props){
        super(props);
        this.salesID = 2;
        this.name = "Dani";
        ComAssignment.setResource("/sales/" + this.salesID);
    }

    componentDidMount() {
        // ComGeolocation.currentPosition((pos) => {
        //     console.log('currentPosition', pos);
        //     this.setState({ currLat: typeof pos.coords == 'undefined' ? 'error' : pos.coords.latitude });
        //     this.setState({ currLong: typeof pos.coords == 'undefined' ? 'error' : pos.coords.longitude });
        // });

        ComGeolocation.watchCurrentPosition((pos) => {
            console.log('watchCurrentPosition', pos);
            this.setState({ currLat: typeof pos.coords == 'undefined' ? 'error' :  pos.coords.latitude });
            this.setState({ currLong: typeof pos.coords == 'undefined' ? 'error' :  pos.coords.longitude });
           
        });

        ComAssignment.getAssignment((response) => {
            this.setState({totalAssignment: response.data.length});
        });
    }

    componentWillUnmount() {
        ComGeolocation.clearWatchCurrentPosition();
    }

    _renderAssignment(){
        if (this.state.totalAssignment === false) {
            return (
                <Spinner />
            );
        }
        else {
            return (
                <Text style={styles.yourTaskTextStat}>
                    {this.state.totalAssignment}
                </Text>
            );
        }
    }

    render() {
        return (
            <Container style={styles.container}>
                <Content>
                    <View>
                        <Text style={styles.welcome}>
                            Sales Name : {this.name}
                        </Text>
                    </View>
                    <View style={styles.yourTask}>
                        <Text style={styles.yourTaskText}>
                            Your Task
                        </Text>
                        {this._renderAssignment()}
                    </View>
                    <View>
                        <Text>
                            Latitude : {this.state.currLat}
                        </Text>
                        <Text>
                            Longitude : {this.state.currLong}
                        </Text>
                    </View>
                    <View style={styles.viewTask}>
                        <Button block onPress={() => Actions.CompTasklist({salesID:this.salesID})}>
                            View Task
                        </Button>
                    </View>
                </Content>
            </Container>
        )
    }
}
