var http = require('http');
var url = require('url');
var fs = require('fs');

var port_num = 8080;

function renderHTML(path, res) {
  fs.readFile(path, function(err, data) {
    if (err) {
      res.writeHead(404, {'Content-Type': 'text/html'});
      return res.end("Page not found error.");
    }
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write(data);
    return res.end();
  });
}

http.createServer(function (req, res) {
  var path = url.parse(req.url).pathname;
  switch (path) {
    case '/' :
      renderHTML('./index.html', res);
      break;
    case '/index.html' :
      renderHTML('./index.html', res);
      break;
    case '/about.html' :
      renderHTML('./about.html', res);
      break;
    case '/contact.html' :
      renderHTML('./contact.html', res);
      break;
    default :
      renderHTML('./404.html', res);
      break;
  }
}).listen(port_num);

console.log('Listening port ' + port_num);
