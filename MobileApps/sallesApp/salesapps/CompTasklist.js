import React, { Component } from 'react';
import {
  StyleSheet,
  View,
  ListView
} from 'react-native';
import { 
  Container, 
  Header,
  Content,
  List,
  ListItem,
  Thumbnail,
  Text,
  Title, 
  Button,
  Badge, 
  Icon 
} from 'native-base';
import { Actions } from 'react-native-router-flux';


export default class CompTasklist extends Component {
  constructor() {
    super();
    this.state = {
      dataSource: new ListView.DataSource({
        rowHasChanged: (row1, row2) => row1 !== row2,
      }),
      loading: true
    }
  }

  loadDataFromServer(salesID) {
    fetch('http://202.158.39.170/salesforce/public/api/assigments/sales/'+salesID)  
      .then((response) => response.json())
      .then((responseJson) => {
        this.setState({
          dataSource: this.state.dataSource.cloneWithRows(responseJson.data),
          loading: false
        });
        console.log("responseJson",responseJson.data);
      })
      .catch((error) => {
        console.error(error);
      })
      .done();
  }

  listRow(rowData) {
    return (
      <ListItem iconRight>
      <Text onPress={() => Actions.ComActivities({id: rowData.customer.customer_id,taskids: rowData.task_id})} style={{ fontSize: 23,height:30 }}>{rowData.task.task_title}</Text>
          <Icon name="ios-compass" style={{ color: '#0A69FE' }} onPress={() => Actions.CompTrackingtask({id: rowData.customer.customer_id,taskids: rowData.task_id})}/>
         <Text>Customer : {rowData.customer.customer_name}</Text>
            <Text>Address : {rowData.customer.customer_address}</Text>
            <Text>Task Id : {rowData.task_id}</Text>
      </ListItem>
    );
  }

  componentDidMount() {
   var salesID = this.props.salesID;
    this.loadDataFromServer(salesID);
  }

  render() {
    return (
      <View style={styles.container}>
        { this.state.loading ? (
          <View style={styles.loaded}>
            <Text>Please Wait</Text>
          </View>
        ) : (
          <List>
            <ListView
              dataSource={this.state.dataSource}
              renderRow={this.listRow}
              enableEmptySections = { true }
              style={styles.rowList}
            />
          </List>  
        )}
      </View>
    );
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    marginTop: 0,
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