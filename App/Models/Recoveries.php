<?php
namespace App\Models;

/**
 * Class Recoveries
 *
 * Handles database operations related to user recovery tokens.
 */
class Recoveries {
    private $sql;

    /**
     * Recoveries constructor.
     *
     * @param \PDO $sql PDO database connection.
     */
    public function __construct($sql) {
        $this->sql = $sql;
    }

    /**
     * Checks if a recovery token is valid.
     *
     * @param string $token Recovery token to validate.
     * @return bool Returns true if the token is valid and not expired, otherwise false.
     */
    public function valid($token) {
        $sql = "SELECT * FROM recoveries WHERE token = :token AND expiresAt > CURRENT_TIMESTAMP";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":token" => $token
        ]);
        return $query->rowCount() > 0;
    }

    /**
     * Retrieves the user ID associated with a recovery token.
     *
     * @param string $token Recovery token to fetch associated user ID.
     * @return mixed Returns the user ID associated with the token.
     */
    public function getUser($token) {
        $sql = "SELECT * FROM recoveries WHERE token = :token";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":token" => $token
        ]);
        return $query->fetch()["userId"];
    }

    /**
     * Deletes a recovery token from the database.
     *
     * @param string $token Recovery token to delete.
     */
    public function delete($token) {
        $sql = "DELETE FROM recoveries WHERE token = :token";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":token" => $token
        ]);
    }

    /**
     * Generates a new recovery token for a user.
     *
     * @param int $userId User ID to generate a recovery token.
     * @return string Returns the generated recovery token.
     */
    public function generate($userId) {
        $token = hash("sha256", $userId . time() . rand(0, 1000000));
        $sql = "INSERT INTO recoveries (userId, token, expiresAt) VALUES (:userId, :token, DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 1 HOUR))";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":userId" => $userId,
            ":token" => $token
        ]);
        return $token;
    }
}