<?php

namespace App\Controllers;

class Users {
    public function index($request, $response, $container){

        $response->SetTemplate("groups.php");

        return $response;        
    }

    public function setMainImage($request, $response, $container){
        
        $imageId = $request->get(INPUT_POST, 'imageId');
        $userId = $request->get('SESSION', 'userId');

        $users = $container->get("\App\Models\Users");
        $checkImage = $users->imageBelongsTo($userId, $imageId);

        if(!$checkImage){
            $response->set("error", 1);
            $response->set("message", "La imatge no pertany a l'usuari");
            return $response;
        }

        $users->updatePortraitImage($userId, $imageId);

        $response->set("error", 0);
        $response->set("message", "Imatge canviada");
        return $response;
    }
}
