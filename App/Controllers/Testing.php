<?php

namespace App\Controllers;

class Testing {
    public function index($request, $response, $container){ 
        $users = $container->get("\App\Models\Users");
        $recoveries = $container->get("\App\Models\Recoveries");

        $userId = $users->getFromEmail("joanpd0@gmail.com");
        $token = $recoveries->generate($userId);
        
        $recoverUrl = "/recover/newPassword?recoveryToken=" . $token;

        $response->set("recoverUrl", $recoverUrl);

        $response->setTemplate("testing.php");
        return $response;
    }
}