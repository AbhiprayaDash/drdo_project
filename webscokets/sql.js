var express = require('express');

var mysql = require('mysql');
var app = express();
var connection = mysql.createConnection({
    host:'localhost',
    user:'root',
    password:'',
    database:'group'
});

connection.connect(function(error){
    if(!!error) {
        console.log('Error');
     }
     else{
         console.log('Connected123');
     }
});
app.get('/',function(req,resp){
   
    connection.query("SELECT * FROM groups ",function(error,result,fields){
        var handle=result[0].name;
    if(!!error){
        console.log('Error');
    }
    else{
        console.log('Sucess!\n');
        console.log(result[0].name);
        resp.send('Hello, '+result[0].name);
    }
    });
})

document.getElementById("handle").innerHTML="Abhipraya";
app.listen(1337);
