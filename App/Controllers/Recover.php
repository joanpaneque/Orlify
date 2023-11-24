<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Recover {
    public function index($request, $response, $container){ 
        $response->setTemplate("recover.php");
        return $response;
    }    


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
            $token = $recoveries->generate($userId);

            $recoverUrl = "{$container["config"]["host"]}/recover/newPassword?recoveryToken={$token}";
            
            $oMail = new PHPMailer(true);
    
            try {
                $oMail->isSMTP();
                $oMail->Host = $container["config"]["smtp"]["host"];
                $oMail->Port = $container["config"]["smtp"]["port"];
                $oMail->SMTPSecure = $container["config"]["smtp"]["secure"];
                $oMail->SMTPAuth = $container["config"]["smtp"]["auth"];
    
                $oMail->Username = $container["config"]["smtp"]["username"];
                $oMail->Password = $container["config"]["smtp"]["password"];
    
                $oMail->setFrom($container["config"]["smtp"]["username"], 'Recuperador de contrasenyes');
                $oMail->addAddress($email, 'usuari');
    
                $oMail->isHTML(true);
                $oMail->Subject = "Link per recuperar al teu compte";
                $oMail->Body = "Recupera la teva contrasenya fent clic a aquest <a href='{$recoverUrl}'>enllaç</a>.";
    
                $oMail->send();
            } catch (Exception $e) {
                // While we don't have a logger, we'll just ignore the exception.
                // We don't want to show the user an error message.
            }
        }
        
        $response->set("email", $email);
        $response->setTemplate("sendMail.php");
        return $response;
    }

    public function newPassword($request, $response, $container) {
        $recoveryToken = $request->get(INPUT_GET, "recoveryToken");

        $recoveries = $container->get("\App\Models\Recoveries");
        $passwords = $container->get("\App\Helpers\Passwords");
        $users = $container->get("\App\Models\Users");

        $response->setTemplate("newPassword.php");

        if (!$recoveries->valid($recoveryToken)) {
            $response->set("error", 1);
            $response->set("message", "El token de recuperació no existeix o ha caducat. Si us plau, torna a sol·licitar la recuperació de la contrasenya.");
            return $response;
        }

        $userId = $recoveries->getUser($recoveryToken);
        // Avoids multiple recoveries
        $recoveries->delete($recoveryToken);

        $plainGeneratedPassword = $passwords->generate();
        $hashedGeneratedPassword = $passwords->hash($plainGeneratedPassword);

        $users->updatePassword($userId, $hashedGeneratedPassword);

        $response->set("error", 0);
        $response->set("message", "S'ha generat una nova contrasenya correctament.");
        $response->set("email", $users->get($userId)["email"]);
        $response->set("password", $plainGeneratedPassword);
        return $response;
    }
}
