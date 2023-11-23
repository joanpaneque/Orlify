<?php

namespace App\Controllers;

class Logout {
    public function logout($request, $response, $container) {
        $response->setSession("logged", NULL);
        $response->setSession("userId", NULL);
        $response->redirect("Location: /login");

        return $response;
    }
}   
