<?php

namespace App\Controllers;

/**
 * Class Register
 *
 * This class manages user registration.
 */
class Register {
    /**
     * Display the registration page.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function index($request, $response, $container) {
        // Set the template for the registration page
        $response->setTemplate("register.php");
        return $response;
    }
}
