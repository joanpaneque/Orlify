<?php

namespace App\Models;

class Database {
    public $sql;

    public function __construct($user, $password, $database, $host) {
        $dsn = "mysql:host={$host};dbname={$database}";

        try {
            $this->sql = new \PDO($dsn, $user, $password);
        } catch (\PDOException $e) {
            die("Ha fallat la connexió: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->sql;
    }
}