<?php

namespace App\Controllers;

/**
 * Class Users
 *
 * This class manages user-related operations.
 */
class Users {
    /**
     * Display the users index page.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function index($request, $response, $container){
        // Set the template for the users page
        $response->setTemplate("groups.php");
        return $response;
    }

    /**
     * Set the main image for the user's profile.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function setMainImage($request, $response, $container) {
        // Get image and user IDs from the request
        $imageId = $request->get(INPUT_POST, 'imageId');
        $userId = $request->get('SESSION', 'userId');

        // Access Users model
        $users = $container->get("\App\Models\Users");
        
        // Check if the image belongs to the user
        $imageBelongsToUser = $users->imageBelongsTo($userId, $imageId);

        if(!$imageBelongsToUser) {
            $response->set("error", 1);
            $response->set("message", "La imatge no pertany a l'usuari");
            return $response;
        }

        // Update the user's main image
        $users->updatePortraitImage($userId, $imageId);

        $response->set("error", 0);
        $response->set("message", "Imatge canviada");
        return $response;
    }

    /**
     * Delete a user's image.
     *
     * @param mixed $request The HTTP request data.
     * @param mixed $response The HTTP response data.
     * @param mixed $container The container for dependencies.
     * @return mixed Returns the response.
     */
    public function deleteImage($request, $response, $container) {
        // Get image and user IDs from the request
        $imageId = $request->get(INPUT_POST, 'imageId');
        $userId = $request->get('SESSION', 'userId');

        // Access Users model
        $users = $container->get("\App\Models\Users");
        
        // Check if the image belongs to the user
        $checkImage = $users->imageBelongsTo($userId, $imageId);

        if (!$checkImage) {
            $response->set("error", 1);
            $response->set("message", "La imatge no pertany a l'usuari");
            return $response;
        }

        // Get user's main image and all images
        $mainUserImage = $users->getMainImage($userId);
        $userImages = $users->getImages($userId);

        if ($imageId == $mainUserImage) {
            if (count($userImages) == 1) {
                // Set the main image to NULL if it's the only image
                $users->updatePortraitImage($userId, NULL);
            } else {
                foreach($userImages as $image) {
                    if ($image !== $mainUserImage) {
                        // Set the main image to $image
                        $users->updatePortraitImage($userId, $image);
                        break;
                    }
                }
            }
        }

        // Delete the user's image
        $users->deletePortraitImage($userId, $imageId);
        
        $response->set("error", 0);
        $response->set("message", "Imatge esborrada");
        
        return $response;
    }
}
