<?php

namespace App\Models;

/**
 * Class Roles
 *
 * Handles database operations related to roles.
 */
class Roles {
    private $sql;

    /**
     * Roles constructor.
     *
     * @param \PDO $sql PDO database connection.
     */
    public function __construct($sql) {
        $this->sql = $sql;
    }

    /**
     * Retrieves all roles.
     *
     * @return array Returns an array containing all roles.
     */
    public function getAll() {
        $sql = "SELECT * FROM roles";
        $query = $this->sql->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Checks if a role exists.
     *
     * @param int $roleId Role ID to check existence.
     * @return array Returns an array containing role details if it exists, otherwise an empty array.
     */
    public function exist($roleId){
        $sql = "SELECT * FROM roles where id = :roleId";
        $query = $this->sql->prepare($sql);
        $query->execute([":roleId" => $roleId]);
        return $query->fetchAll();
    }
}
