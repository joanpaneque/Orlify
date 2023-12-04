<?php

namespace App\Controllers;

class Groups {
    public function index($request, $response, $container) {

        $users = $container->get("\App\Models\Users");
        $images = $container->get("\App\Models\Images");


        $imgs = $users->getImages(2);
        $urls = [];

        foreach($imgs as $image) {
            $urls[] = $images->getUrl($image)[0];
        }

        $response->set("images", $urls);

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
        // $userId = $request->get('SESSION', 'userId');   
        $userId = 2;   
        $images = $container->get("\App\Models\Images");
        $users = $container->get("\App\Models\Users");

        $image1 = $request->get("FILES", "image1");
        $image2 = $request->get("FILES", "image2");
        $image3 = $request->get("FILES", "image3");

        $imgs = [$image1, $image2, $image3];


        foreach($imgs as $image) {

            $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
            $tokenizedFile = hash("sha256", $extension .  $userId . rand(0, 10000)) . $extension;
            $url = "userData/" . $tokenizedFile;


            if (!move_uploaded_file($image["tmp_name"], $url)) {
                $response->set("error", 1);
                $response->set("message", "imatge no inserida");
                return $response;
            }

            $imageId = $images->add($url);
            $users->addImage($userId, $imageId);
        }

        $response->set("error", 0);
        $response->set("message", "S'han pogut registrar les imatges correctament");
        return $response;
    }
}

