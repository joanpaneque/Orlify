<?php

namespace App\Controllers;

/**
 * Class Register
 *
 * This class manages user registration.
 */
class Register {
    /**
     * Display the registration page.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function index($request, $response, $container) {
        // Set the template for the registration page
        $response->setTemplate("register.php");
        return $response;
    }


    public function register($request, $response, $container){
        $users = $container->get("\App\Models\Users");
        $passwords = $container->get("\App\Helpers\Passwords");

        $name = $request->get(INPUT_POST, 'name');
        $surnames = $request->get(INPUT_POST, 'surnames');
        $username = $request->get(INPUT_POST, 'username');
        $email = $request->get(INPUT_POST, 'email');
        $password = $request->get(INPUT_POST, 'password');
        $password2 = $request->get(INPUT_POST, 'password2');
        

        if ($password !== $password2){
            $response->set("error", 1);
            $response->set("message", "Las contrasenyes no coincideixen");
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


        $passwordMeetsDirectives = $passwords->meetsDirectives($password);
        if (!$passwordMeetsDirectives) {
            $response->set("error", 1);
            $response->set("message", "La contrasenya no cumple con los requisitos correspondientes, por favor intentelo de nuevo");
            return $response;
        }
        $password = $passwords->hash($password);
        

        $users->createUser($name, $surnames, $username, $email, $password);

        
        $response->set("error", 0);
        $response->set("message", "Datos cambiados correctamente");
        $response->redirect("Location: /login"); 
        return $response;
    }
}   
