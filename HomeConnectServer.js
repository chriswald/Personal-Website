var http = require("http");
var https = require("https");

module.exports = {
    Initialize: Initialize
};

HomeConnectServerGlobals = {
    Server: {},
    Port: 80,
};

function ServerMain(request, response) {
  console.log("Received a request");
  response.writeHead(200, {"Content-Type": "text/html"});
  response.write("<!DOCTYPE \"html\">");
  response.write("<html><body>Foo</body></html>");
  response.end();
}

function SetUpServer(port) {
    HomeConnectServerGlobals.Server = http.createServer(ServerMain);

    try {
        HomeConnectServerGlobals.Server.listen(port);
    } catch (e) { }
}

function Initialize(port) {
    SetUpServer(port);
}
