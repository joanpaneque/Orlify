<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Recover {
    
    public function index($request, $response, $container) { 
        $response->setTemplate("recover.php");
        return $response;
    }   
    
    
    public function sendMail($request, $response, $container) {
        $email = $request->get(INPUT_POST, "email");
    
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $model = $container->get("\App\Models\Users");
            $correoExiste = $model->existEmail($email);
        }
    
        if ($correoExiste) {        
            $oMail = new PHPMailer(true);
    
            try {
                // Configuración del servidor SMTP para Gmail
                $oMail->isSMTP();
                $oMail->Host = 'smtp.gmail.com';
                $oMail->Port = 587;
                $oMail->SMTPSecure = 'tls';
                $oMail->SMTPAuth = true;
    
                // Configuración de credenciales de Gmail
                $oMail->Username = 'oorlify@gmail.com';
                $oMail->Password = 'sefd fpru owzv qbqz';
    
                // Configuración del remitente y destinatario
                $oMail->setFrom('oorlify@gmail.com', 'Administrador');
                $oMail->addAddress($email, 'roger');
    
                // Configuración del asunto y cuerpo del correo
                $oMail->isHTML(true);
                $oMail->Subject = 'Hola pepe';
                $oMail->Body = ' Hola soy un mensaje <b>en negrita</b>';
    
                // Envío del correo
                $oMail->send();
    
                echo $email;
            } catch (Exception $e) {
                echo 'Error al enviar el correo: ' . $oMail->ErrorInfo;
            }
        } else {
            echo "Error: No se pudo completar. El correo electrónico no existe en la base de datos.";
        }
    
        $response->setTemplate("sendMail.php");
        return $response;
    }
}
