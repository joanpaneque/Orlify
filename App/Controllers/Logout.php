<?php

namespace App\Controllers;

/**
 * Class Logout
 *
 * This class manages logout functionality.
 */
class Logout {
    /**
     * Logout the user.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function logout($request, $response, $container) {
        // Unset user session data to logout
        $response->setSession("logged", NULL);
        $response->setSession("userId", NULL);

        // Redirect the user to the login page
        $response->redirect("Location: /login");

        return $response;
    }
}
