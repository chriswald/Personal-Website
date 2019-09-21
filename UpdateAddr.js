var timer = require("timers");
var https = require("https");
var querystring = require("querystring");

module.exports = {
    Initialize: Initialize
};

UpdateAddrGlobals = {
    SessionToken: "",
    ClientID: "1",
    Email: "",
    Password: "",
    Port: ""
};

function UpdateClientHubAddress() {
    try {
        var data = querystring.stringify({
            "SessionToken": UpdateAddrGlobals.SessionToken,
            "ID": UpdateAddrGlobals.ClientID
        });

        var postOpts = {
            host: "api.chriswald.com",
            port: 443,
            path: "/homeconnect/updateaddr",
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "Content-Length": Buffer.byteLength(data)
            }
        };

        // Set up the request
        var postReq = https.request(postOpts, function(res) {
            res.setEncoding('utf8');
        });

        postReq.write(data);
        postReq.end();
    } catch (e) { }
}

function UpdateClientHubListenPort() {
    try {
        var data = querystring.stringify({
            "SessionToken": UpdateAddrGlobals.SessionToken,
            "ID": UpdateAddrGlobals.ClientID,
            "Port": UpdateAddrGlobals.Port
        });

        var postOpts = {
            host: "api.chriswald.com",
            port: 443,
            path: "/homeconnect/setclientport",
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "Content-Length": Buffer.byteLength(data)
            }
        };

        // Set up the request
        var postReq = https.request(postOpts, function(res) {
            res.setEncoding('utf8');
            res.on('error', function (body) {
                console.log(body.message);
            });
        });

        postReq.write(data);
        postReq.end();
    } catch (e) { }
}

function GetSessionToken(callback) {
    try {
        var data = querystring.stringify({
            "email": UpdateAddrGlobals.Email,
            "password": UpdateAddrGlobals.Password
        });

        var postOpts = {
            "host": "api.chriswald.com",
            "port": 443,
            "path": "/auth/auth",
            "method": "POST",
            "headers": {
                "Content-Type": "application/x-www-form-urlencoded",
                "Content-Length": Buffer.byteLength(data)
            }
        };

        // Set up the request
        var postReq = https.request(postOpts, function(res) {
            res.setEncoding('utf8');
            res.on('data', function (body) {
                var bodyObj = JSON.parse(body);
                UpdateAddrGlobals.SessionToken = bodyObj.SessionToken;
                callback();
            });
        });

        postReq.write(data);
        postReq.end();
    } catch (e) { }
}

function RenewSessionToken() {
    try {
        var data = querystring.stringify({
            "SessionToken": UpdateAddrGlobals.SessionToken
        });

        var postOpts = {
            host: "api.chriswald.com",
            port: 443,
            path: "/auth/renewtoken",
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "Content-Length": Buffer.byteLength(data)
            }
        };

        // Set up the request
        var postReq = https.request(postOpts, function(res) {
            res.setEncoding('utf8');
            res.on('data', function (body) {
                var bodyObj = JSON.parse(body);
                UpdateAddrGlobals.SessionToken = bodyObj.SessionToken;
            });
        });

        postReq.write(data);
        postReq.end();
    } catch (e) { }
}

function StartTimers() {
    var ThreeMinutes = 3 * 60 * 1000;
    var FiveSeconds = 5 * 1000;

    var sessionInterval = setInterval(RenewSessionToken, ThreeMinutes);
    var updateInterval = setInterval(UpdateClientHubAddress, FiveSeconds);
}

function Initialize(email, password, port) {
    UpdateAddrGlobals.Email = email;
    UpdateAddrGlobals.Password = password;
    UpdateAddrGlobals.Port = port;
    GetSessionToken(function() {
        UpdateClientHubListenPort();
        StartTimers();
    });
}
