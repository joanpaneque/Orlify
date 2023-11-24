<?php

use \Emeset\Contracts\Routers\Router;
use \App\Controllers\Groups;
use \App\Controllers\Recover;
use \App\Controllers\Login;
use \App\Controllers\Logout;
use \App\Controllers\Testing;

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../vendor/autoload.php";

$container = new \App\Container(__DIR__ . "/../App/config.php");
$app = new \Emeset\Emeset($container);

$app->get("/ajax/portraits/create", [Groups::class, "createPortrait"]);
$app->get("/ajax/groups/members", [Groups::class, "getMembers"]);
$app->get("/recover", [Recover::class, "index"]);
$app->post("/recover/sendMail", [Recover::class, "sendMail"]);
$app->get("/recover/newPassword", [Recover::class, "newPassword"]);
$app->get("/groups", [Groups::class, "index"]);
$app->get("/login", [Login::class, "login"]);
$app->post("/logout", [Logout::class, "logout"]);
$app->get("/testing", [Testing::class, "index"]);


$app->get("/index", function ($request, $response) {
    $response->setBody("Logged in!");
    return $response;
});

$app->get(Router::DEFAULT_ROUTE, function ($request, $response) {
    $response->setBody("Hola!");
    return $response;
});

$app->execute();