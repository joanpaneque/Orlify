<?php

namespace App\Controllers;

class Recover {
    
    public function index($request, $response, $container){ 
        $response->setTemplate("recover.php");
        return $response;
    }    

    public function sendMail($request,$response,$container){ // composer require phpmailer/phpmailer

        $email = $request->get(INPUT_POST, "email");

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $model = $container->get("Users");
            $correo = $model->validateUser($email);
        }

        if($correo){
            
                // Ahora, utiliza PHPMailer para enviar un correo de prueba
                require 'vendor/autoload.php'; // Asegúrate de que la ruta sea correcta

                // Crea una instancia de PHPMailer
                $mail = new PHPMailer\PHPMailer\PHPMailer();

                // Configura el servidor SMTP (reemplaza con tus propios detalles)
                $mail->isSMTP();
                $mail->Host = 'tu_servidor_smtp.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'tu_correo_smtp@example.com';
                $mail->Password = 'tu_contraseña_smtp';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Configura el remitente y el destinatario
                $mail->setFrom('tu_correo@example.com', 'Tu Nombre');
                $mail->addAddress($correo);

                // Configura el asunto y el cuerpo del correo
                $mail->Subject = 'Correo de prueba';
                $mail->Body = 'Este es un correo de prueba enviado desde PHPMailer.';

                // Envía el correo
                if ($mail->send()) {
                    echo "El correo electrónico $correo existe en la base de datos y se ha enviado un correo de prueba.";
                } else {
                    echo "Error al enviar el correo de prueba: " . $mail->ErrorInfo;
                }
        }
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