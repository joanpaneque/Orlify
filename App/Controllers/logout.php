<?php

namespace App\Controllers;

class Logout
{
    
    public function logout($request, $response, $container)
    {
        $userId = $response->getSession("id");
        
        $response->setSession("logged", false);
        $response->setSession("id", null);
        $response->redirect("Location: /login");

        return $response;
    }

}   