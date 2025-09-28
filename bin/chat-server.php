#!/usr/bin/env php
<?php
require dirname(__DIR__).'/vendor/autoload.php';

use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use App\WebSocket\ChatServer;

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new ChatServer()
        )
    ),
    8080 // puerto WebSocket
);

echo "Servidor WebSocket escuchando en ws://localhost:8080\n";
$server->run();

