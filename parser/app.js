var express = require('express');
var app = express();
var bodyParser = require('body-parser');
app.use(bodyParser());
var util = require('util'),
    exec = require('child_process').exec,
    child;
var arrChild=[];

app.get('/start', function (req, res) {
  
  //res.json({status:200,message:"Pengiriman pesan sedang di proses"});
  var command ='C://xampp/htdocs/sbdoj/parser/parser.py' ;
  var child =require('child_process').spawn('python',[command]);
  console.log("start parser");
  /*child = exec(command, 
	function (error, stdout, stderr) {      
	    console.log('stdout: ' + stdout);
	    console.log('stderr: ' + stderr);
	    if (error !== null) {
	      console.log('exec error: ' + error);
	    }
  });*/
var objChild={};
var num = 1
objChild.child=child;
objChild.id=num;
arrChild.push(objChild); 
res.statusCode = 302; 
res.setHeader("Location", "http://localhost/sbdoj/public/events");
res.end();

});

app.get('/stop', function (req, res) {
  
  //res.json({status:200,message:"Pengiriman pesan sedang di proses"});
  for(i=0;i<arrChild.length;i++)
  {
	  if(arrChild[i].id==1){
		  arrChild[i].child.kill('SIGINT');
		  console.log("kill parser");
	  }
  }

res.statusCode = 302; 
res.setHeader("Location", "http://localhost/sbdoj/public/events");
res.end();
});
var server = app.listen(3000, function () {
  var host = server.address().address;
  var port = server.address().port;

console.log('Example app listening at http://%s:%s', host, port);

});