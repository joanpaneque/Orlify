<?php


    namespace App\Models;

    class Users {
        private $sql;

        /**
         * Users constructor.
         * @param mixed $sql
         */
        public function __construct($sql) {
            $this->sql = $sql;
        }

        /**
         * Update password for a user.
         * @param int $userId
         * @param string $password
         */
        public function updatePassword($userId, $password) {
            $sql = "UPDATE users SET password = :password WHERE id = :userId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":password" => $password,
                ":userId" => $userId
            ]);
        }

        /**
         * Get user details by user ID.
         * @param int $userId
         * @return mixed
         */
        public function get($userId) {
            $sql = "SELECT * FROM users WHERE id = :userId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":userId" => $userId
            ]);
            return $query->fetch();
        }

        /**
         * Get user ID from email.
         * @param string $email
         * @return int
         */
        public function getFromEmail($email) {
            $sql = "SELECT * FROM users WHERE email = :email";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":email" => $email
            ]);
            return $query->fetch()["id"];
        }

        /**
         * Get all users.
         * @return array
         */
        public function getAll() {
            $sql = "SELECT * FROM users";
            $query = $this->sql->prepare($sql);
            $query->execute();

            $result = $query->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as &$row) {
                unset($row['password']);
            }

            return $result;
        }

        /**
         * Check if image belongs to user.
         * @param int $userId
         * @param int $imageId
         * @return mixed
         */
        public function imageBelongsTo($userId, $imageId){
            $sql = "SELECT * FROM portraitsUsersImages WHERE userId = :userId AND imageId = :imageId";
            $query = $this->sql->prepare($sql);
            $query->execute([":userId" => $userId, ":imageId" => $imageId]);
    
            return $query->rowCount() > 0;
        }



        /**
         * Update the main portrait image for a user.
         * @param int $userId
         * @param int $imageId
         */
        public function updatePortraitImage($userId, $imageId) {
            $sql = "UPDATE users SET mainPortraitImageId = :imageId WHERE id = :userId";
            $query = $this->sql->prepare($sql);
            $query->execute([":userId" => $userId, ":imageId" => $imageId]);
        }

        /**
         * Insert a new user into the database.
         * @param int $roleId
         * @param string $name
         * @param string $surnames
         * @param string $username
         * @param string $email
         * @param string $password
         */
        public function insertUser($roleId, $name, $surnames, $username, $email, $password) {
            $sql = "INSERT INTO users (roleId, name, surnames, username, email, password) VALUES (:roleId, :name, :surnames, :username, :email, :password)";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":roleId" => $roleId,
                ":name" => $name,
                ":surnames" => $surnames,
                ":username" => $username,
                ":email" => $email,
                ":password" => $password
            ]);
        }
        
        /**
         * Get the main portrait image ID for a user.
         * @param int $userId
         * @return mixed
         */
        public function getMainImage($userId) {
            $sql = "SELECT mainPortraitImageId FROM users WHERE id = :userId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":userId" => $userId
            ]);
            return $query->fetchAll(\PDO::FETCH_COLUMN)[0];
        }

        /**
         * Get images associated with a user.
         * @param int $userId
         * @return array
         */
        public function getImages($userId) {
            $sql = "SELECT imageId FROM portraitsUsersImages WHERE userId = :userId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":userId" => $userId
            ]);
            return $query->fetchAll(\PDO::FETCH_COLUMN);
        }

        /**
         * Check if an email exists in the database.
         * @param string $email
         * @return mixed
         */
        public function emailExsist($email){
            $sql = "SELECT * FROM users WHERE email = :email";
            $query = $this->sql->prepare($sql);
            $query->execute([":email" => $email]);
            return $query->fetchAll();
        }
        
        /**
         * Check if a username exists in the database.
         * @param string $username
         * @return mixed
         */
        public function userNameExsist($username){
            $sql = "SELECT * FROM users WHERE username = :username";
            $query = $this->sql->prepare($sql);
            $query->execute([":username" => $username]);
            return $query->fetchAll();
        }

        /**
         * Delete a specific portrait image for a user.
         * @param int $userId
         * @param int $imageId
         */
        public function deletePortraitImage($userId, $imageId){
            $sql = " DELETE FROM portraitsusersimages WHERE userId = :userId AND imageId = :imageId;";
            $query = $this->sql->prepare($sql);
            $query->execute([":userId" => $userId, ":imageId" => $imageId]);
        }

        /**
         * Delete a user by ID.
         * @param int $userId
         * @return bool
         */
        public function deleteUser($userId) {
            $sql = "DELETE FROM users where id = :userId";
            $query = $this->sql->prepare($sql);
            $result = $query->execute([":userId" => $userId]);
            $rowCount = $query->rowCount();
            return ($rowCount > 0);
        }

        /**
         * Get user's password by user ID.
         * @param int $userId
         * @return mixed
         */
        public function getPassword($userId) {
            $sql = "SELECT password FROM users WHERE Id = :userId";
            $query = $this->sql->prepare($sql);
            $query->execute([":userId" => $userId]);
            return $query->fetchAll(\PDO::FETCH_COLUMN)[0];
        }

        /**
         * Update user details.
         * @param int $userId
         * @param int $roleId
         * @param string $name
         * @param string $surnames
         * @param string $username
         * @param string $email
         * @param string $password
         * @return bool
         */
        public function updateUser($userId, $roleId, $name, $surnames, $username, $email, $password) {
            $sql = "UPDATE users SET roleId = :roleId, name = :name, surnames = :surnames, username = :username, email = :email, password = :password WHERE id = :userId";
            $query = $this->sql->prepare($sql);
            $result = $query->execute([
                ":roleId" => $roleId,
                ":name" => $name,
                ":surnames" => $surnames,
                ":username" => $username,
                ":email" => $email,
                ":password" => $password,
                ":userId" => $userId
            ]);
            $rowCount = $query->rowCount();
            return ($rowCount > 0);
        }

        public function createUser($name, $surnames, $username, $email, $password) {
            $sql = "INSERT INTO users (roleId, name, surnames, username, email, password) VALUES (1, :name, :surnames, :username, :email, :password)";
            $query = $this->sql->prepare($sql);
            $result = $query->execute([
                ":name" => $name,
                ":surnames" => $surnames,
                ":username" => $username,
                ":email" => $email,
                ":password" => $password
            ]);
            $rowCount = $query->rowCount();
            return ($rowCount > 0);
        }
    }