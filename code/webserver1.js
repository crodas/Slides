var http = require('http');
var i = 0;
http.createServer(function (req, res) {
    console.log('request ' + (i++));
    res.writeHead(200, {'Content-Type': 'text/plain'});
    res.end('Hello World\n');
}).listen(8080, "127.0.0.1");
console.log('Server running at http://127.0.0.1:8080/');
