<?php

namespace App\Controllers;

class Login {
    public function login($request, $response, $container) {
        $email = $request->get(INPUT_POST, "email");
        $password = $request->get(INPUT_POST, "password");

        // Helpers
        $passwords = $container->get("\App\Helpers\Passwords");

        // Models
        $users = $container->get("\App\Models\Users");

        $userId = $users->getFromEmail($email);

        if (!$userId) {
            $response->redirect("Location: /testing");  
            return $response;          
        }

        $hashedPassword = $users->get($userId)["password"];

        if (!$passwords->verify($password, $hashedPassword)) {
            $response->redirect("Location: /testing");  
            return $response;
        }

        $response->setSession("userId", $userId);
        $response->setSession("logged", true);        
        $response->redirect("Location: /index");
        return $response;
    }
}   
