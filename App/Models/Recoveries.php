<?php
    namespace App\Models;

    class Recoveries {
        private $sql;

        public function __construct($sql) {
            $this->sql = $sql;
        }

        public function valid($token) {
            $sql = "SELECT * FROM recoveries WHERE token = :token AND expiresAt > CURRENT_TIMESTAMP";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":token" => $token
            ]);
            return $query->rowCount() > 0;
        }

        public function getUser($token) {
            $sql = "SELECT * FROM recoveries WHERE token = :token";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":token" => $token
            ]);
            return $query->fetch()["userId"];
        }

        public function delete($token) {
            $sql = "DELETE FROM recoveries WHERE token = :token";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":token" => $token
            ]);
        }

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