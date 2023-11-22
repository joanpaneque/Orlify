<?php


    namespace App\Models;

    class Groups {
        private $sql;

        public function __construct($sql) {
            $this->sql = $sql;
        }

        public function exists($groupId) {
            $sql = "SELECT * FROM groups WHERE id = :groupId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":groupId" => $groupId
            ]);

            return $query->rowCount() > 0;
        }

    }