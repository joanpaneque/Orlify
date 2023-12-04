<?php

namespace App\Controllers;

class Groups {
    public function index($request, $response, $container){

        $response->SetTemplate("testingimg.php");

        return $response;        
    }


    public function createPortrait($request, $response, $container) {
        $groupId = $request->get(INPUT_POST, "groupId");
        

        $portraits = $container->get("\App\Models\Portraits");
        $groups = $container->get("\App\Models\Groups");

        if (!$groups->exists($groupId)) {
            $response->set("error", 1);
            $response->set("message", "El grup {$groupId} no existeix");
            return $response;
        }

        if ($portraits->isCreated($groupId)) {
            $response->set("error", 1);
            $response->set("message", "El grup {$groupId} ja té una orla creada");
            return $response;
        }

        $portraits->create($groupId);

        $response->set("error", 0);
        $response->set("message", "Orla creada correctament");

        return $response;
    }

    public function getMembers($request, $response, $container) {

        $groupId = $request->get(INPUT_GET, 'groupId');

        $users = $container->get("\App\Models\Users");
        $groups = $container->get("\App\Models\Groups");

        $groupExists = $groups->exists($groupId);
        
        if (!$groupExists) {
            $response->set("error", 1);
            $response->set("message", "Grup no trobat");
            return $response;
        }

        $groupUsers = $groups->getUsers($groupId);
        
        $response->set("error", 0);
        $response->set("message", "S'han pogut recuperar els usuaris del grup");
        $response->set("users", $groupUsers);

        return $response;
    } 

    public function uploadImagesMember($request, $response, $container) {
        $r = $request->get("FILES", "images");
        $userId = $request->get('SESSION', 'userId');      
        $groups = $container->get("\App\Models\Groups");

    
        foreach($r as $image){
            var_dump($image);
            $uploadImg = $groups->uploadImg($image);

            if (!$uploadImg){
                $response->set("error", 1);
                $response->set("message", "imatge no inserida");
                return $response;
            }

            $imageId = $groups->getUploadImg($image);

            $userImage = $groups->userImage($imageId,$userId);

            if (!$userImage){
                $response->set("error", 1);
                $response->set("message", "imatge no inserida");
                return $response;
            }
        }

        $response->set("error", 0);
        $response->set("message", "S'han pogut registrar les imatges correctament");
        return $response;
    }
}

