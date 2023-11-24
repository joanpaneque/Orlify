<?php

namespace App\Controllers;

class Register {
    public function index($request, $response, $container) {
    
        $response->setTemplate("register.php");
        return $response;
        
    }
}   
