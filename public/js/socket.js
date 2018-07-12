var express = require('express');
var app     = express();

var server  = require('http').createServer(app);

var server    = app.listen(8080);

var io        = require('socket.io').listen(server);


var redis = require('redis');





io.on('connection' , function (socket) {

    console.log('new client connected');

    var redisClient = redis.createClient();
        redisClient.subscribe('message');


        redisClient.on('message' , function (channel, message) {
            console.log('new message - '+message);
            socket.emit(channel,message);
        });
});

