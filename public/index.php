<?php

use \Emeset\Contracts\Routers\Router;
use \App\Controllers\Groups;
use \App\Controllers\Recover;
use \App\Controllers\Login;
use \App\Controllers\Logout;
use \App\Controllers\Testing;
use \App\Controllers\Admin;
use \App\Controllers\Users;
use \App\Controllers\Register;
use \App\Controllers\Portrait;

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../vendor/autoload.php";

$container = new \App\Container(__DIR__ . "/../App/config.php");
$app = new \Emeset\Emeset($container);

$app->get("/ajax/portraits/create", [Groups::class, "createPortrait"]);
$app->get("/ajax/groups/members", [Groups::class, "getMembers"]);
$app->get("/ajax/users/setMainImage", [Users::class, "setMainImage"]);
$app->get("/ajax/users/deleteImage", [Users::class, "deleteImage"]);
$app->get("/activated", [Portrait::class, "togglePortrait"]);
$app->get("/password", [Admin::class, "updateUser"]);


$app->get("/recover", [Recover::class, "index"]);
$app->post("/recover/sendMail", [Recover::class, "sendMail"]);
$app->get("/recover/newPassword", [Recover::class, "newPassword"]);
$app->get("/groups", [Groups::class, "index"]);

$app->post("/login", [Login::class, "login"]);
$app->get("/login", [Login::class, "index"]);

$app->post("/logout", [Logout::class, "logout"]);
$app->get("/testing", [Testing::class, "index"]);

$app->get("/admin", [Admin::class, "index"]);


$app->get("/index", function ($request, $response) {
    $response->setBody("Logged in!");
    return $response;
});
$app->get("/register", [Register::class, "index"]);

$app->get(Router::DEFAULT_ROUTE, function ($request, $response) {
    $response->setBody("Hola!");
    return $response;
});

$app->execute();