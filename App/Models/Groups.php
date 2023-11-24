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
    }