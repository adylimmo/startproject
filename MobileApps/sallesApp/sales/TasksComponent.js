import React, { Component } from 'react';
import {
  StyleSheet,
  Text,
  View,
  ListView,
  TouchableOpacity
} from 'react-native';
import { Actions } from 'react-native-router-flux';
var DeviceInfo = require('react-native-device-info');

export default class TasksComponent extends Component {
  constructor() {
    super();
    this.state = {
      dataSource: new ListView.DataSource({
        rowHasChanged: (row1, row2) => row1 !== row2,
      }),
      loading: true
    }
  }

  loadDataFromServer() {
    fetch('http://202.158.39.170/salesforce/public/api/assigments')  
      .then((response) => response.json())
      .then((responseJson) => {
        this.setState({
          dataSource: this.state.dataSource.cloneWithRows(responseJson.data),
          loading: false
        });
        console.log("log",responseJson.data[0].assigment_id);
      })
      .catch((error) => {
        console.error(error);
      })
      .done();
  }

  listRow(rowData) {
    return (
        <TouchableOpacity onPress={Actions.DetailTask}>
      <View style={ styles.rowStyle }>
      <Text style={{fontSize:23}}>{ rowData.task.task_title }</Text>
      <Text>{ rowData.task.task_description }</Text>
        <Text>Customer : { rowData.customer.customer_name }</Text>
        <Text>Address : { rowData.customer.customer_address }</Text>
        
        
        
      </View>
      </TouchableOpacity>
    );
  }

  componentDidMount() {
    this.loadDataFromServer();
  }

  render() {
    console.log('hiyaa',this.state.dataSource);
    return (
      <View style={styles.container}>
        { this.state.loading ? (
          <View style={styles.loaded}>
            <Text>Loading</Text>
          </View>
        ) : (
          <ListView
            dataSource={this.state.dataSource}
            renderRow={this.listRow}
            enableEmptySections = { true }
            style={styles.rowList}
          />
        )}
      </View>
    );
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#F5FCFF',
  },
  loaded: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#F5FCFF',
  },
  rowList: {
    marginTop: 20
  },
  rowStyle: {
    backgroundColor: '#fff',
    padding: 10,
    margin: 10,
    shadowOffset: {
      width: 1,
      height: 1,
    },
    shadowRadius: 2,
    shadowOpacity: 0.2,
    shadowColor: '#ccc',
    elevation: 1
  }
});