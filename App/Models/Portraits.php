<?php
    namespace App\Models;

    class Portraits {
        private $sql;

        public function __construct($sql) {
            $this->sql = $sql;
        }

        public function isCreated($groupId) {
            $sql = "SELECT * FROM portraits WHERE groupId = :groupId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":groupId" => $groupId
            ]);

            return $query->rowCount() > 0;
        }

        public function create($groupId) {
            $sql = "INSERT INTO portraits (groupId) VALUES (:groupId)";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":groupId" => $groupId
            ]);
        }

    }