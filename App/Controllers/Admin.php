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

    public function updateUser($request, $response, $container) {

        $users = $container->get("\App\Models\Users");
        $roles = $container->get("\App\Models\Roles");
        $passwords = $container->get("\App\Helpers\Passwords");

        $userId = $request->get(INPUT_POST, 'userid');
        $roleId = $request->get(INPUT_POST, 'roleId');
        $name = $request->get(INPUT_POST, 'name');
        $surname = $request->get(INPUT_POST, 'surname');
        $username = $request->get(INPUT_POST, 'username');
        $email = $request->get(INPUT_POST, 'email');
        $password = $request->get(INPUT_GET, 'password');
        $cardurl = $request->get(INPUT_POST, 'cardurl');
        $mainPortraitId = $request->get(INPUT_POST, 'mainPortraitId');

        $roleExist = $roles->exist($roleId);        

        if (!$roleExist) {
            $response->set("error", 1);
            $response->set("message", "El rol no existe con la base de datos");
            return $response;
        }
        
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response->set("error", 1);
            $response->set("message", "El email no corresponde con los requisitos");
            return $response;
        }

        $passwordMeetsDirectives = $passwords->meetsDirectives($password);

        if (!$passwordMeetsDirectives) {
            $response->set("error", 1);
            $response->set("message", "La contraseña no cumple con los requisitos correspondientes, por favor intentelo de nuevo");
            return $response;
        }

        $portraitExist = $users->portraitExsist($userId);

        if (!$portraitExist) {
            $response->set("error", 1);
            $response->set("message", "No exsite una imagen con esas caracteristicas");
            return $response;
        }

        $users->updateUsers($userId,$roleId,$name,$surname,$username,$email,$password,$cardurl,$mainPortraitId);

        $response->set("error", 0);
        $response->set("message", "Datos cambiados correctamente");
        $response->redirect("Location: /admin"); 
        return $response;
    }
}