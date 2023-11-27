<?php
    namespace App\Models;

    class Roles {
        private $sql;

        public function __construct($sql) {
            $this->sql = $sql;
        }

        public function getAll() {
            $sql = "SELECT * FROM roles";
            $query = $this->sql->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }

        public function exist($roleId){
            $sql = "SELECT * FROM roles where id = :roleId";
            $query = $this->sql->prepare($sql);
            $query->execute([":roleId" => $roleId]);
            return $query->fetchAll();
        }
    }