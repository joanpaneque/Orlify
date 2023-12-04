<?php

namespace App\Controllers;

/**
 * Class Portrait
 *
 * This class manages operations related to portraits.
 */
class Portrait {

    /**
     * Display the index page for portraits.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function index($request, $response, $container) {

        $response->SetTemplate("portrait.php");

        return $response;        
    }

    /**
     * Toggle portrait for a group.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
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

        // Toggle the portrait activation
        $portraits->togglePortrait($groupId);
        $isActivated = $portraits->isActivated($groupId);

        $response->set("error", 0);
        $response->set("message", "Orla " . ($isActivated ? 'activada' : 'desactivada') . " correctament");
        return $response;
    }
}
