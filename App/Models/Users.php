<?php


    namespace App\Models;

    class Users {
        private $sql;

        public function __construct($sql) {
            $this->sql = $sql;
        }

        public function updatePassword($userId, $password) {
            $sql = "UPDATE users SET password = :password WHERE id = :userId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":password" => $password,
                ":userId" => $userId
            ]);
        }

        public function get($userId) {
            $sql = "SELECT * FROM users WHERE id = :userId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":userId" => $userId
            ]);
            return $query->fetch();
        }

        public function getFromEmail($email) {
            $sql = "SELECT * FROM users WHERE email = :email";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":email" => $email
            ]);
            return $query->fetch()["id"];
        }


        public function getAll() {
            $sql = "SELECT * FROM users";
            $query = $this->sql->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }

        public function imageBelongsTo($userId, $imageId){
            $sql = "SELECT * FROM portraitsUsersImages WHERE userId = :userId AND imageId = :imageId";
            $query = $this->sql->prepare($sql);
            $query->execute([":userId" => $userId, ":imageId" => $imageId]);
    
            return $query->rowCount() > 0;
        }

        public function updatePortraitImage($userId, $imageId) {
            $sql = "UPDATE users SET mainPortraitImageId = :imageId WHERE id = :userId";
            $query = $this->sql->prepare($sql);
            $query->execute([":userId" => $userId, ":imageId" => $imageId]);

        }
        public function updateUsers($userId,$roleId,$name,$surname,$username,$email,$password,$cardurl,$mainPortraitId) {
            $sql = "UPDATE users SET mainPortraitImageId = :imageId, roleId = :roleId, name = :name, surname = :surname, username = :username, email = :email, password = :password, cardurl = :cardurl, mainportraitid = :mainportraitid WHERE id = :userId";
            $query = $this->sql->prepare($sql);
            $query->execute([":userId" => $userId, ":roleId" => $roleId, ":name" => $name, ":surname" => $surname, ":username" => $username, ":email" => $email, ":password" => $password, ":cardurl" => $cardurl,":mainportraitid" => $mainPortraitId]);

        }

        public function getMainImage($userId) {
            $sql = "SELECT mainPortraitImageId FROM users WHERE id = :userId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":userId" => $userId
            ]);
            return $query->fetchAll(\PDO::FETCH_COLUMN)[0];
        }

        public function getImages($userId) {
            $sql = "SELECT imageId FROM portraitsUsersImages WHERE userId = :userId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":userId" => $userId
            ]);
            return $query->fetchAll(\PDO::FETCH_COLUMN);
        }

        public function portraitExsist($userId){
            $sql = "SELECT * FROM portraitsusersimages WHERE userId = :userId";
            $query = $this->sql->prepare($sql);
            $query->execute([":userId" => $userId]);

        }
        
        public function deletePortraitImage($userId, $imageId){
            $sql = " DELETE FROM portraitsusersimages WHERE userId = :userId AND imageId = :imageId;";
            $query = $this->sql->prepare($sql);
            $query->execute([":userId" => $userId, ":imageId" => $imageId]);

        }
    }
