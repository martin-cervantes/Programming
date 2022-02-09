var port_num = 8080;

var http = require('http');

var functionServer = function(request, response) {
    response.writeHead(200, {'Content-Type':'text/plain'});
    response.end('Hello World');
};

var server = http.createServer(functionServer).listen(port_num);
console.log('Listening port ' + port_num);
