import React, { Component } from 'react';
import {
  StyleSheet,
  Text,
  View,
  ListView
} from 'react-native';
import { List, ListItem, Thumbnail, Icon } from 'native-base';
import { Actions } from 'react-native-router-flux';


export default class LoadData extends Component {
  constructor() {
    super();
    this.state = {
      seconds: 2,
    };
    this.state = {
      dataSource: new ListView.DataSource({
        rowHasChanged: (row1, row2) => row1 !== row2,
      }),
      loading: true
    }
  }

  loadDataFromServer() {
    fetch('http://202.158.39.170/salesforce/public/api/assigments/sales/1')
      .then((response) => response.json())
      .then((responseJson) => {
        this.setState({
          dataSource: this.state.dataSource.cloneWithRows(responseJson.data),
          loading: false
        });
      })
      .catch((error) => {
        console.error(error);
      })
      .done();
  }

  listRow(rowData) {
    return (
      <View>
        <List>
          <ListItem iconRight>
            <Text onPress={Actions.Camera} style={{ fontSize: 23 }}>{rowData.task.task_title}</Text>
            <Text>Customer : {rowData.customer.customer_name}</Text>
            <Text>Address : {rowData.customer.customer_address}</Text>
            <Icon name='ios-compass' onPress={Actions.CompTrackingtask} />
          </ListItem>
        </List>
      </View>
    );
  }

  componentDidMount() {
    this.loadDataFromServer();
  }

  render() {
    console.log('hiyaa', this.state.dataSource);
    return (
      <View style={styles.container}>
        {this.state.loading ? (
          <View style={styles.loaded}>
            <Text>Please Wait</Text>
          </View>
        ) : (
            <ListView
              dataSource={this.state.dataSource}
              renderRow={this.listRow}
              enableEmptySections={true}
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
    marginTop: 1,
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