// Kelas untuk Upload Gambar
// Author Ari
var FileUpload = require('NativeModules').FileUpload;

class CompUpload{
    
    obj = {
        uploadUrl: 'http://127.0.0.1:3000',
        method: 'POST', // default 'POST',support 'POST' and 'PUT'
        headers: {
          'Accept': 'application/json',
        },
        files: [
          {
            name: 'one', // optional, if none then `filename` is used instead
            filename: 'one.w4a', // require, file name
            filepath: '/xxx/one.w4a', // require, file absoluete path
            filetype: 'audio/x-m4a', // options, if none, will get mimetype from `filepath` extension
          },
        ]
    };


    // Nothing for now
    constructor(){
    }

    // Setter
    setRestURL(restURL) {
        this.obj.uploadUrl = restURL;
    }

    //set file
    setName(name) {
        this.obj.files.name = name;
    }
    setFilesName(filesName) {
        this.obj.files.filename = filesName;
    }

    setFilePath(filePath) {
        this.obj.files.filepath = filePath;
    }

    setFileType(fileType) {
        this.obj.files.filetype = fileType;
    }

    // Ambil assigment
    send(callback) {
        FileUpload.upload(obj, function(err, result) {
          console.log('upload:', err, result);
          callback(result);
        })
    }
}

export default new CompUpload