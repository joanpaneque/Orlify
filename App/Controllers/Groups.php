<?php

namespace App\Controllers;

class Groups {
    public function index($request, $response, $container){

        $response->SetTemplate("groups.php");

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
}