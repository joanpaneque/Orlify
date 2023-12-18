<?php

namespace App\Controllers;

/**
 * Class Portrait
 *
 * This class manages operations related to portraits.
 */
class carnet {

    /**
     * Display the index page for portraits.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function index($request, $response, $container) {

        $response->SetTemplate("carnet.php");

        return $response;        
    }

}