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

        $groupId = $request->get(INPUT_GET, 'groupId');

        // Models
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
}
