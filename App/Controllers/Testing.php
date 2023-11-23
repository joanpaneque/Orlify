<?php

namespace App\Controllers;

class Testing {
    public function index($request, $response, $container){ 
        $response->setTemplate("testing.php");
        return $response;
    }    
}