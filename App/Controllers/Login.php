<?php

namespace App\Controllers;

class Login {
    public function index($request, $response, $container) {
        $email = $request->get(INPUT_GET, "email");
        $response->set("email", $email);

        $response->setTemplate("login.php");
        return $response;
    }


    public function login($request, $response, $container) {
        $email = $request->get(INPUT_POST, "email");
        $password = $request->get(INPUT_POST, "password");
        $remember = $request->get(INPUT_POST, "remember");

        // Helpers
        $passwords = $container->get("\App\Helpers\Passwords");

        // Models
        $users = $container->get("\App\Models\Users");

        $userId = $users->getFromEmail($email);

        if (!$userId) {
            $response->redirect("Location: /login?email={$email}"); 
            return $response;          
        }

        $hashedPassword = $users->get($userId)["password"];

        if (!$passwords->verify($password, $hashedPassword)) {
            $response->redirect("Location: /login?email={$email}");
            return $response;
        }

        $response->setSession("userId", $userId);
        $response->setSession("logged", true);

        $response->redirect("Location: /index");
        return $response;
    }
}   
