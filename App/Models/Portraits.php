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

        public function isActivated($groupId) {
            $sql = "SELECT activated FROM portraits WHERE groupId = :groupId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":groupId" => $groupId
            ]);
            return $query->fetchAll(\PDO::FETCH_COLUMN)[0];
        }
        
        public function togglePortrait($groupId){
            $sql = "UPDATE portraits SET activated = !activated where groupId = :groupId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":groupId" => $groupId
            ]);
        }

        

    }