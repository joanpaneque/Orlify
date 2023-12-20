<?php

namespace App\Controllers;

/**
 * Class Groups
 *
 * This class manages operations related to groups.
 */
class Webcam {
    /**
     * Display the index page for Webcam.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function index($request, $response, $container){

    $response->SetTemplate("webcam.php");
    return $response;   
    }

    public function photo($request, $response, $container){
        
    }
}