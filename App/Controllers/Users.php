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

    public function deleteImage($request, $response, $container) {
        
        $imageId = $request->get(INPUT_POST, 'imageId');
        $userId = $request->get('SESSION', 'userId');

        $users = $container->get("\App\Models\Users");
        
        $checkImage = $users->imageBelongsTo($userId, $imageId);

        if (!$checkImage) {
            $response->set("error", 1);
            $response->set("message", "La imatge no pertany a l'usuari");
            return $response;
        }

        $mainUserImage = $users->getMainImage($userId);
        $userImages = $users->getImages($userId);

        if ($imageId == $mainUserImage) {
            if (count($userImages) == 1) {
                // Poner la imagen principal como NULL
                $users->updatePortraitImage($userId, NULL);
            } else {
                foreach($userImages as $image) {
                    if ($image !== $mainUserImage) {
                        // Poner la imagen principal como $image
                        $users->updatePortraitImage($userId, $image);
                        break;
                    }
                }
            }
        }

        $users->deletePortraitImage($userId, $imageId);
        
        $response->set("error", 0);
        $response->set("message", "Imatge esborrada");
        
        return $response;

    }
}
