<?php


    namespace App\Models;

    class Users {
        private $sql;

        public function __construct($sql) {
            $this->sql = $sql;
        }


        public function existEmail($email){
            $query = 'SELECT email FROM users WHERE email = :emails;';
            $stm = $this->sql->prepare($query);
            $stm->execute([':emails' => $email]);
        
            return $stm->rowCount() > 0;
        }
        

    }