// Kelas untuk mendapatkan data Assignment dari server
// Author Riko Logwirno
// Edit Ari
class CompFormdata{

    // Parameter default untuk koneksi ke restAPI
    restURL = "http://202.158.39.170/salesforce/public/imageupload";
    resource = "";
    sendMethod = "POST";
    sendHeaders = {
        'Content-Type': 'multipart/form-data',
    }
    sendData = [];

    // Nothing for now
    constructor(){
    }

    // Setter
    setRestURL(restURL) {
        this.restURL = restURL;
    }
    setSendData(sendData) {
        this.sendData = sendData;
    }
    // Ambil assigment
    send(callback) {
        fetch(this.restURL,{
          method: this.sendMethod,
          headers: this.sendHeaders,
          body: this.sendData
          })
        .then((response) => response.json())
        .then((responseJson) => {
            callback(responseJson);
        });

    }
}

export default new CompFormdata
