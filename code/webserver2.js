var http = require('http');
var i = 0;
http.createServer(function (req, res) {
    var id = i++;
    console.log('request ' + id);
    setTimeout(function() {
        console.log('response ' + id);
        res.writeHead(200, {'Content-Type': 'text/plain'});
        res.end('Hello World: ' + id + ' \n');
    }, 10 * 1000);
}).listen(8080, "127.0.0.1");
console.log('Server running at http://127.0.0.1:8080/');
