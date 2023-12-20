<?php

namespace App\Controllers;

/**
 * Class Groups
 *
 * This class manages operations related to groups.
 */
class Groups {
    /**
     * Display the index page for groups.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function index($request, $response, $container){
    
        // $userId = $request->get('SESSION', 'userId');
        $userId = 1;

        $groups = $container->get("\App\Models\Groups");     

        // groups
        $groupUsers = $groups->getGroupUser($userId);
        $groupNames = [];

        foreach ($groupUsers as $groupName) {
            $names = $groups->getGroupName($groupName);
            $name = isset($names[0]) ? $names[0] : null;
            if ($name) {
                $groupNames[] = $name;
            }
        }
        
        $response->set("error", 0);
        $response->set("message", "S'han pogut recuperar els usuaris del grup");
        $response->set("users", $groupNames);

        $response->SetTemplate("groups.php");

        return $response;              
    }

    /**
     * Create a portrait for a group.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
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

    /**
     * Get members of a group.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function getMembers($request, $response, $container) {

        $groupId = $request->get(INPUT_POST, 'selectedValue');
    
        $groups = $container->get("\App\Models\Groups");
        $users = $container->get("\App\Models\Users");
    
        $groupExists = $groups->exists($groupId);
        
        if (!$groupExists) {
            $response->set("error", 1);
            $response->set("message", "Grup no trobat");
            return $response;
        }
    
        $groupUsersId = $groups->getUsers($groupId);
        $groupUsers = []; 


        foreach ($groupUsersId as $userId) {
            $groupUsers[] = $users->get($userId);
        }

        $response->set("error", 0);
        $response->set("message", "S'han pogut recuperar els usuaris del grup");
        $response->set("users", $groupUsers);
    
        return $response;
    }
    

    // public function getGroups($request, $response, $container) {

    //     $userId = 3;

    //     $groups = $container->get("\App\Models\Groups");

    //     $groupUsers = $groups->getGroupUser($userId);

    //     $response->set("error", 0);
    //     $response->set("message", "S'han pogut recuperar els usuaris del grup");
    //     $response->set("users", $groupUsers);

    //     $response->SetTemplate("groups.php");
    //     return $response;
    // } 



    public function uploadImagesMember($request, $response, $container) {

        $userId = $request->get(INPUT_POST, 'userId');


        $images = $container->get("\App\Models\Images");
        $users = $container->get("\App\Models\Users");
    
        $image1 = $request->get("FILES", "image1");
        $image2 = $request->get("FILES", "image2");
        $image3 = $request->get("FILES", "image3");

        $response->set("userId", $userId);
    
        $imgs = [$image1, $image2, $image3];
        $imageUrls = [];

        foreach($imgs as $image) {
            if (!$image) {
                continue;
            }

            $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
            $tokenizedFile = hash("sha256", $extension .  $userId . rand(0, 10000)) . $extension;
            $url = "userData/" . $tokenizedFile;
    
            if (!move_uploaded_file($image["tmp_name"], $url)) {
                $response->set("error", 1);
                $response->set("message", "Image not uploaded");
                $response->set("result", "error");
                return $response;
            }else{
                $imageId = $images->add($url);
                $users->addImage($userId, $imageId);
            }
            $imageUrls[] = $url;
        }

        $response->set("error", 0);
        $response->set("message", "Imatges pujades correctament");
        $response->set("imageUrls", $imageUrls);
    
        return $response;
    }

    public function toggleOrles($request, $response, $container){
        // Get report ID from the POST request
        $orlaId = $request->get(INPUT_POST, 'orlaId');
        
        // Access the Reports model
        $Portraits = $container->get("\App\Models\Portraits");
        
        // Check if the report exists
        if (!$Portraits->exists($orlaId)) {
            $response->set("error", 1);
            $response->set("message", "Aquesta Orla no existeix");
            return $response;
        }

        // Toggle the report status and check its activation
        $Portraits->togglePortrait($orlaId);
        $isActivated = $Portraits->isActivated($orlaId);

        // Set response messages based on the report activation status
        $response->set("error", 0);
        $response->set("message", "Orla " . ($isActivated ? 'activat' : 'desactivat') . " correctament");
        return $response;
    }

    public function getImages($request, $response, $container) {
        
        $userId = $request->get(INPUT_POST, 'userId');

        $users = $container->get("\App\Models\Users");
        $images = $container->get("\App\Models\Images");

        $imgs = $users->getImages($userId);
        $urls = [];

        foreach($imgs as $image) {
            $urls[] = $images->getUrl($image)[0];
        }


        $response->set("images", $urls);
    
        return $response;   
    }


}   