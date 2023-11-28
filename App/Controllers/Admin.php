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
        //Models
        $users = $container->get("\App\Models\Users");
        $roles = $container->get("\App\Models\Roles");
        $passwords = $container->get("\App\Helpers\Passwords");

        //
        $userId = $request->get(INPUT_POST, 'userid');
        $roleId = $request->get(INPUT_POST, 'roleId');
        $name = $request->get(INPUT_POST, 'name');
        $surnames = $request->get(INPUT_POST, 'surnames');
        $username = $request->get(INPUT_POST, 'username');
        $email = $request->get(INPUT_POST, 'email');
        $password = $request->get(INPUT_POST, 'password');


        $roleExist = $roles->exist($roleId);
        if (!$roleExist) {
            $response->set("error", 1);
            $response->set("message", "El rol no existe con la base de datos");
            return $response;
        }
        

        $userNamelExist = $users->userNameExsist($username);        
        if ($userNamelExist) {
            $response->set("error", 1);
            $response->set("message", "El username ya existeix");
            return $response;
        }

        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response->set("error", 1);
            $response->set("message", "El email no corresponde con los requisitos");
            return $response;
        } 
        $emailExist = $users->emailExsist($email);
        if ($emailExist) {
            $response->set("error", 1);
            $response->set("message", "El correu ya existeix");
            return $response;
        }


        if ($password == "") {
            $password = $users->getPassword($userId);
            $response->set("message", "El contraseña igual");
        } else{
            $passwordMeetsDirectives = $passwords->meetsDirectives($password);
            if (!$passwordMeetsDirectives) {
                $response->set("error", 1);
                $response->set("message", "La contrasenya no cumple con los requisitos correspondientes, por favor intentelo de nuevo");
                return $response;
            }
            $password = $passwords->hash($password);
        }
        

        $users->updateUsers($userId, $roleId, $name, $surnames, $username, $email, $password);

        
        $response->set("error", 0);
        $response->set("message", "Datos cambiados correctamente");
        $response->redirect("Location: /admin"); 
        return $response;
    }
}