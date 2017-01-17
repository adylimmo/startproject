import React, { Component, PropTypes } from 'react';
import {
  Text,
  View,
  TouchableHighlight
} from 'react-native';

export default class CustomButton extends Component {
  constructor(){
    super();
    this.state = {
      teks: '',
      warnaBackground: '',
      jarakLapisan: 0,
      warnaTeks: ''
    }
  }

  static propTypes = {
    teks: React.PropTypes.string,
    warnaBackground: React.PropTypes.string,
    jarakLapisan: React.PropTypes.number,
    warnaTeks: React.PropTypes.string,
    ubahState: React.PropTypes.bool,
    klikTombol: React.PropTypes.func
  }

  static defaultProps = {
    teks: 'Tombol Default',
    warnaBackground: '#286090',
    jarakLapisan: 10,
    warnaTeks: '#fff',
    ubahState: false
  }
  
  componentWillMount() {
    this.setState({
      teks: 'Dari State',
      warnaBackground: 'green',
      jarakLapisan: 10,
      warnaTeks: '#fff'
    });
  }

  render() {
    return (
      this.props.ubahState === false ? (
        <TouchableHighlight 
          style={{ 
            backgroundColor: this.props.warnaBackground,
            padding: this.props.jarakLapisan,
          }}
          onPress={ this.props.klikTombol }
        >
          <Text style={{ color: this.props.warnaTeks }}>{ this.props.teks }</Text>
        </TouchableHighlight>
      ) : (
        <TouchableHighlight 
          style={{ 
            backgroundColor: this.state.warnaBackground,
            padding: this.state.jarakLapisan,
          }}
        >
          <Text style={{ color: this.state.warnaTeks }}>{ this.state.teks }</Text>
        </TouchableHighlight>
      )
      
    );
  }
}