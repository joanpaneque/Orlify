<?php

namespace App\Controllers;

class Users {

    public function index($request, $response, $container){

        $response->SetTemplate("groups.php");

        return $response;        
    }

    public function tooglePortrait($request, $response, $container){
        $portraitId = $request->get(INPUT_POST, 'id');
        
        $users = $container->get("\App\Models\Users");
        $users->tooglePortrait($portraitId);
    }
}