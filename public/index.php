<?php

use \Emeset\Contracts\Routers\Router;

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../vendor/autoload.php";

$container = new \App\Container(__DIR__ . "/../App/config.php");
$app = new \Emeset\Emeset($container);


$app->get("/logout", "\App\Controllers\Logout:logout");

$app->get(Router::DEFAULT_ROUTE, function ($request, $response) {
    $response->setBody("Hola!");
    return $response;
});

$app->execute();