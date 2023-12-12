<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class Recover
 *
 * This class manages password recovery operations.
 */
class Recover {
    /**
     * Display the recovery index page.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function index($request, $response, $container){ 
        $response->setTemplate("recover.php");
        return $response;
    }

    /**
     * Send recovery email to the user.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function sendMail($request, $response, $container) {
        // Input data
        $email = $request->get(INPUT_POST, "email");

        // Models
        $users = $container->get("\App\Models\Users");
        $recoveries = $container->get("\App\Models\Recoveries");
     
        // Validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response->redirect("Location: /recover");
            return $response;
        }

        $userId = $users->getFromEmail($email);

        if ($userId) {
            // Generate recovery token
            $token = $recoveries->generate($userId);

            // Construct recovery URL
            $recoverUrl = "{$container["config"]["host"]}/recover/newPassword?recoveryToken={$token}";

            // Initialize PHPMailer
            $oMail = new PHPMailer(true);
    
            try {
                // Configure PHPMailer
                $oMail->isSMTP();
                // ... (other configurations)

                // Set email content and send
                $oMail->send();
            } catch (Exception $e) {
                // While we don't have a logger, we'll just ignore the exception.
                // We don't want to show the user an error message.
                print_r($e);
            }
        }
        
        // Set response data
        $response->set("email", $email);
        $response->setTemplate("sendMail.php");
        return $response;
    }

    /**
     * Display the page for creating a new password after recovery.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function newPassword($request, $response, $container) {
        // Get recovery token from request
        $recoveryToken = $request->get(INPUT_GET, "recoveryToken");

        // Models and helpers
        $recoveries = $container->get("\App\Models\Recoveries");
        $passwords = $container->get("\App\Helpers\Passwords");
        $users = $container->get("\App\Models\Users");

        // Set template for the response
        $response->setTemplate("newPassword.php");

        // Check validity of recovery token
        if (!$recoveries->valid($recoveryToken)) {
            // Set error message if token is invalid or expired
            $response->set("error", 1);
            $response->set("message", "El token de recuperació no existeix o ha caducat. Si us plau, torna a sol·licitar la recuperació de la contrasenya.");
            return $response;
        }

        // Get user ID associated with the token
        $userId = $recoveries->getUser($recoveryToken);
        // Avoids multiple recoveries by deleting the token
        $recoveries->delete($recoveryToken);

        // Generate a new password and update the user's password
        $plainGeneratedPassword = $passwords->generate();
        $hashedGeneratedPassword = $passwords->hash($plainGeneratedPassword);
        $users->updatePassword($userId, $hashedGeneratedPassword);

        // Set success message and new password details for the response
        $response->set("error", 0);
        $response->set("message", "S'ha generat una nova contrasenya correctament.");
        $response->set("email", $users->get($userId)["email"]);
        $response->set("password", $plainGeneratedPassword);
        return $response;
    }
}
