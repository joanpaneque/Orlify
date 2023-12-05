<?php
/**
 * This file sets up routes and controllers for a web application.
 */

 namespace App;

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
use \App\Controllers\DeleteUser;
use \App\Controllers\Reports;

// Set error reporting and include necessary files
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../vendor/autoload.php";

// Initialize container and application
$container = new \App\Container(__DIR__ . "/../App/config.php");
$app = new \Emeset\Emeset($container);

/**
 * Define routes and their corresponding controller methods.
 */

 // hola

// GET routes
$app->get("/ajax/portraits/create", [Groups::class, "createPortrait"]);
$app->get("/ajax/portraits/toggle", [Portrait::class, "togglePortrait"]);
$app->get("/ajax/groups/members", [Groups::class, "getMembers"]);
$app->get("/ajax/users/setMainImage", [Users::class, "setMainImage"]);
$app->get("/ajax/users/deleteImage", [Users::class, "deleteImage"]);
$app->get("/delete", [DeleteUser::Class, "delete"]);
$app->get("/ajax/portrait/toggle", [Portrait::class, "togglePortrait"]);
$app->get("/admin/updateUser", [Admin::class, "updateUser"]);
$app->post("/admin/createuser", [Admin::class, "createUser"]);

$app->get("/recover", [Recover::class, "index"]);
$app->get("/recover/newPassword", [Recover::class, "newPassword"]);
$app->get("/groups", [Groups::class, "index"]);


$app->get("/login", [Login::class, "index"]);
$app->post("/login", [Login::class, "login"]);

$app->get("/logout", [Logout::class, "logout"]);
$app->get("/testing", [Testing::class, "index"]);
$app->get("/admin", [Admin::class, "index"]);
$app->get("/reports", [Reports::class, "index"]);
$app->get("/index", function ($request, $response) { // Anonymous function route
    $response->setBody("Logged in!");
    return $response;
});
$app->get("/register", [Register::class, "index"]);
$app->get(Router::DEFAULT_ROUTE, function ($request, $response) { // Default route
    $response->setBody("Hola!");
    return $response;
});

// POST routes
$app->post("/ajax/Reports/marked", [Reports::class, "toggleReports"]);
$app->post("/admin/updateUser", [Admin::class, "updateUser"]); // Conflicting route definition
$app->post("/admin/deleteUser", [Admin::class, "deleteUser"]);
$app->post("/recover/sendMail", [Recover::class, "sendMail"]);
$app->post("/reports/toggleReports", [Reports::class, "toggleReports"]);

/**
 * Executes the defined routes.
 */
$app->execute();
