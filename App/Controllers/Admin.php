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

        $userId = $request->get(INPUT_POST, 'userId');
        $roleId = $request->get(INPUT_POST, 'roleId');
        $name = $request->get(INPUT_POST, 'name');
        $surnames = $request->get(INPUT_POST, 'surnames');
        $username = $request->get(INPUT_POST, 'username');
        $email = $request->get(INPUT_POST, 'email');
        $password = $request->get(INPUT_POST, 'password');

        $roleExist = $roles->exist($roleId);
        if (!$roleExist) {
            $response->setSession("status", [
                "error" => 1,
                "message" => "El rol no existeix a la base de dades"
            ]);
            return $response;
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response->setSession("status", [
                "error" => 1,
                "message" => "El email no correspon amb els requisits"
            ]);
            return $response;
        } 
        if ($password == "") {
            $password = $users->getPassword($userId);
        } else {
            $passwordMeetsDirectives = $passwords->meetsDirectives($password);
            if ($passwordMeetsDirectives["error"]) {
                $response->setSession("status", [
                    "error" => 1,
                    "message" => $passwordMeetsDirectives["message"]
                ]);
                return $response;
            }
            $password = $passwords->hash($password);
        }
        
        $users->updateUser($userId, $roleId, $name, $surnames, $username, $email, $password);
        $response->setSession("status", [
            "error" => 0,
            "message" => "Dades canviades correctament"
        ]);
        $response->redirect("Location: /admin"); 
        return $response;
    }

    public function createUser($request, $response, $container) {
        $users = $container->get("\App\Models\Users");
        $roles = $container->get("\App\Models\Roles");
        $passwords = $container->get("\App\Helpers\Passwords"); 

        $name = $request->get(INPUT_POST, 'name');
        $surnames = $request->get(INPUT_POST, 'surnames');
        $username = $request->get(INPUT_POST, 'username');
        $email = $request->get(INPUT_POST, 'email');
        $password = $request->get(INPUT_POST, 'password');        

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

        $passwordMeetsDirectives = $passwords->meetsDirectives($password);
        if (!$passwordMeetsDirectives) {
            $response->set("error", 1);
            $response->set("message", "La contrasenya no cumple con los requisitos correspondientes, por favor intentelo de nuevo");
            return $response;
        }
        $password = $passwords->hash($password);

        $users->createUser($name, $surnames, $username, $email, $password);
        
        $response->set("error", 0);
        $response->set("message", "Datos Insertados correctamente");
        $response->redirect("Location: /admin"); 
        return $response;
    }

    public function deleteUser($request, $response, $container) {
        $users = $container->get("\App\Models\Users");
        $recoveries = $container->get("\App\Models\Recoveries");
        $userId = $request->get(INPUT_POST, 'userId');

        $recoveries->deleteAll($userId);

        $users->deleteUser($userId);
        $response->set("error", 0);
        $response->set("message", "Usuari eliminat correctament");

        $response->redirect("Location: /admin");
        return $response;
    }

    public function importUsersCSV($request, $response, $container) {
        $users = $container->get("\App\Models\Users");
        $csvFile = $request->get("FILES", "csv");

        $csv = array_map('str_getcsv', file($csvFile["tmp_name"]));

        $nameIndex = array_search("name", $csv[0]);
        $surnamesIndex = array_search("surnames", $csv[0]);
        $usernameIndex = array_search("username", $csv[0]);
        $emailIndex = array_search("email", $csv[0]);
        $passwordIndex = array_search("password", $csv[0]);
        $roleIdIndex = array_search("roleId", $csv[0]);

        for ($i = 1; $i < count($csv); $i++) {
            $users->createUser($csv[$i][$nameIndex], $csv[$i][$surnamesIndex], $csv[$i][$usernameIndex], $csv[$i][$emailIndex], $csv[$i][$passwordIndex], $csv[$i][$roleIdIndex]);
        }

        $response->set("csv", $csv);

        return $response;
    }

    public function addBots($request, $response, $container) {
        $botsAmount = $request->get(INPUT_POST, "botsAmount");

        $randomUserGeneratorApiUrl = "https://randomuser.me/api/?results=" . $botsAmount;
        $randomUserGeneratorApi = file_get_contents($randomUserGeneratorApiUrl);
        $randomUserGeneratorApi = json_decode($randomUserGeneratorApi, true);

        $users = $container->get("\App\Models\Users");
        $passwords = $container->get("\App\Helpers\Passwords");

        $password = "testing10";
        $encryptedPassword = $passwords->hash($password);

        for ($i = 0; $i < $botsAmount; $i++) {
            $name = $randomUserGeneratorApi["results"][$i]["name"]["first"];
            $surnames = $randomUserGeneratorApi["results"][$i]["name"]["last"];
            $username = $randomUserGeneratorApi["results"][$i]["login"]["username"];
            $email = $randomUserGeneratorApi["results"][$i]["email"];

            $users->createUser($name, $surnames, $username, $email, $encryptedPassword);
        }

        $response->redirect("Location: /admin");

        return $response;
    }
}