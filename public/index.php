<?php

use \Emeset\Contracts\Routers\Router;
use \App\Controllers\Groups;
use \App\Controllers\Recover;

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../vendor/autoload.php";

$container = new \App\Container(__DIR__ . "/../App/config.php");
$app = new \Emeset\Emeset($container);

$app->get("/ajax/portraits/create", [Groups::class, "createPortrait"]);
$app->get("/recover", [Recover::class, "index"]);
$app->post("/recover/sendMail", [Recover::class, "sendMail"]);

$app->get(Router::DEFAULT_ROUTE, function ($request, $response) {
    $response->setBody("Hola!");
    return $response;
});

$app->execute();