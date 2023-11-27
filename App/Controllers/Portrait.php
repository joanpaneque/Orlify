<?php

namespace App\Controllers;

class Portrait {

    public function index($request, $response, $container) {

        $response->SetTemplate("groups.php");

        return $response;        
    }

    public function togglePortrait($request, $response, $container) {
        $groupId = $request->get(INPUT_POST, 'groupId');
        
        $portraits = $container->get("\App\Models\Portraits");
        $groups = $container->get("\App\Models\Groups");

        if (!$groups->exists($groupId)) {
            $response->set("error", 1);
            $response->set("message", "Aquest grup no existeix");
            return $response;
        }

        if (!$portraits->isCreated($groupId)) {
            $response->set("error", 1);
            $response->set("message", "Aquest grup no te orla");
            return $response;
        }
        $portraits->togglePortrait($groupId);
        $isActivated = $portraits->isActivated($groupId);

        $response->set("error", 0);
        $response->set("message", "Orla " . ($isActivated ? 'activada' : 'desactivada') . " correctament");
        return $response;

    }
}
