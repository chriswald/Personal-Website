var config = require("./config.js");
var HomeConnectServer = require("./HomeConnectServer.js");
var UpdateAddrService = require("./UpdateAddr.js");

function Main()
{
  UpdateAddrService.Initialize(config.ApiLogin.Email, config.ApiLogin.Password, config.Server.ListenPort);
  HomeConnectServer.Initialize(config.Server.ListenPort);
}

Main();
