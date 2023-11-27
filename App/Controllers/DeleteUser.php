<?php

namespace App\Controllers;

class DeleteUser {
    public function delete($request, $response, $container) {

        $users = $container->get("\App\Models\Users");
        $userId = $request->get(INPUT_GET, "userId");
       
        $deleteUser = $users->deleteUser($userId);

        if ($deleteUser) {
            $response->set("error", 0); 
            $response->set("message", "Usuario eliminado correctamente");
        } else {
            $response->set("error", 1);
            $response->set("message", "Error al eliminar el usuario");
        }

        return $response;
    }
}