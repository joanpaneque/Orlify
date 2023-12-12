<?php

namespace App\Models;

/**
 * Class Database
 *
 * Represents a database connection.
 */
class Database {
    public $sql;

    /**
     * Database constructor.
     *
     * @param string $user Database user.
     * @param string $password User's password.
     * @param string $database Database name.
     * @param string $host Database host.
     */
    public function __construct($user, $password, $database, $host) {
        $dsn = "mysql:host={$host};dbname={$database}";

        try {
            $this->sql = new \PDO($dsn, $user, $password);
        } catch (\PDOException $e) {
            die("Ha fallat la connexió: " . $e->getMessage());
        }
    }

    /**
     * Get the database connection.
     *
     * @return \PDO The PDO database connection.
     */
    public function getConnection() {
        return $this->sql;
    }
}
