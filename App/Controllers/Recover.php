<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Recover {
    public function index($request, $response, $container){ 
        
        $response->SetTemplate("recover.php");

        return $response;
    }    


    public function sendMail($request,$response,$container){ // composer require phpmailer/phpmailer

        $email = $request->get(INPUT_POST, "email");
     
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response->redirect("Location: /recover");
            return $response;
        }
        
        $users = $container->get("\App\Models\Users");
        $recoveries = $container->get("\App\Models\Recoveries");

        $userId = $users->getFromEmail($email);

        if ($userId) {
            $token = $recoveries->generate($userId);
            $recoverUrl = "http://localhost:8080/recover/newPassword?recoveryToken={$token}";

            $oMail = new PHPMailer(true);
    
            try {
                // Configuración del servidor SMTP para Gmail
                $oMail->isSMTP();
                $oMail->Host = 'smtp-es.securemail.pro';
                $oMail->Port = 465;
                $oMail->SMTPSecure = 'ssl';
                $oMail->SMTPAuth = true;
    
                // Configuración de credenciales de Gmail
                $oMail->Username = 'recovery@orlify.es';
                $oMail->Password = '6VhE3&7@ul%!E';
    
                // Configuración del remitente y destinatario
                $oMail->setFrom('recovery@orlify.es', 'Recuperador de contrasenyes');
                $oMail->addAddress($email, 'usuari');
    
                // Configuración del asunto y cuerpo del correo
                $oMail->isHTML(true);
                $oMail->Subject = "Link per recuperar al teu compte";
                $oMail->Body = "Hola soy un mensaje <b>en negrita</b>, <a href ='{$recoverUrl}'>Link recuperar contrasenya</a> ";
    
                // Envío del correo
                $oMail->send();
            } catch (Exception $e) {
                echo 'Error al enviar el correo: ' . $oMail->ErrorInfo;
            }
        }
        
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
