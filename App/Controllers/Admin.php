<?php

namespace App\Controllers;

class Admin {
    public function index($request, $response, $container) {

        // Models
        $users = $container->get("\App\Models\Users");
        $roles = $container->get("\App\Models\Roles");

        $allUsers = $users->getAll();
        $allRoles = $roles->getAll();

        $response->set("users", $allUsers);
        $response->set("roles", $allRoles);

        $response->setTemplate("admin.php");
        return $response;
    }
}