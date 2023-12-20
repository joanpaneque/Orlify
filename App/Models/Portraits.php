<?php
namespace App\Models;

/**
 * Class Portraits
 *
 * Handles database operations related to portraits.
 */
class Portraits {
    private $sql;

    /**
     * Portraits constructor.
     *
     * @param \PDO $sql PDO database connection.
     */
    public function __construct($sql) {
        $this->sql = $sql;
    }

    /**
     * Checks if a portrait is created for a specific group.
     *
     * @param int $groupId Group ID to check for portrait creation.
     * @return bool Returns true if a portrait exists for the group, otherwise false.
     */
    public function isCreated($groupId) {
        $sql = "SELECT * FROM portraits WHERE groupId = :groupId";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":groupId" => $groupId
        ]);

        return $query->rowCount() > 0;
    }

    /**
     * Creates a new portrait for a specific group.
     *
     * @param int $groupId Group ID to create a portrait.
     */
    public function create($groupId) {
        $sql = "INSERT INTO portraits (groupId) VALUES (:groupId)";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":groupId" => $groupId
        ]);
    }

    /**
     * Checks if a portrait is activated for a specific group.
     *
     * @param int $groupId Group ID to check for portrait activation.
     * @return mixed Returns the activation status of the portrait.
     */
    public function isActivated($groupId) {
        $sql = "SELECT activated FROM portraits WHERE groupId = :groupId";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":groupId" => $groupId
        ]);
        return $query->fetchAll(\PDO::FETCH_COLUMN)[0];
    }

    public function isPublic($groupId) {
        $sql = "SELECT public FROM portraits WHERE groupId = :groupId";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":groupId" => $groupId
        ]);
        return $query->fetchAll(\PDO::FETCH_COLUMN)[0];
    }
    
    /**
     * Toggles the activation status of a portrait for a specific group.
     *
     * @param int $groupId Group ID to toggle portrait activation.
     */
    public function togglePortrait($groupId){
        $sql = "UPDATE portraits SET activated = !activated WHERE groupId = :groupId";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":groupId" => $groupId
        ]);
    }

    public function publicPortrait($groupId){
        $sql = "UPDATE portraits SET public = !public WHERE groupId = :groupId";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":groupId" => $groupId
        ]);
    }

    public function exists($orlaId) {
        $sql = "SELECT * FROM portraits WHERE id = :orlaId";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":orlaId" => $orlaId
        ]);

        return $query->rowCount() > 0;
    }
}
