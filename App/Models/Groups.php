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

        public function getUsers($groupId) {
            $students = $this->getStudents($groupId);
            $teachers = $this->getTeachers($groupId);

            $users = array_merge($students, $teachers);

            return array_unique($users);
        }

        public function getStudents($groupId) {
            $sql = "SELECT userId  FROM studentsusersgroups WHERE groupId = :groupId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":groupId" => $groupId
            ]);
            return $query->fetchAll(\PDO::FETCH_COLUMN);
        }

        public function getTeachers($groupId) {
            $sql = "SELECT userId FROM teachersusersgroups WHERE groupId = :groupId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":groupId" => $groupId
            ]);
            return $query->fetchAll(\PDO::FETCH_COLUMN);
        }

        public function uploadImg($image){
            $sql = "INSERT INTO images (url) values (:image)";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":image" => $image
            ]);
            return $query->fetchAll(\PDO::FETCH_COLUMN);
        }

        public function getUploadImg($image){
            $sql = "select * from images where url = :image";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":image" => $image
            ]);
            return $query->fetchAll(\PDO::FETCH_COLUMN);
        }

        public function userImage($imageId,$userId){
            $sql = "INSERT INTO portraitsusersimages values (:userId, :imagesId)";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":imagesid" => $imageId,
                ":userId" => $userId
            ]);
            return $query->fetchAll(\PDO::FETCH_COLUMN);
        }
    }