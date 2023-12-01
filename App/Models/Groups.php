<?php

namespace App\Models;

/**
 * Class Groups
 *
 * Handles database operations related to groups.
 */
class Groups {
    private $sql;

    /**
     * Groups constructor.
     *
     * @param \PDO $sql PDO database connection.
     */
    public function __construct($sql) {
        $this->sql = $sql;
    }

    /**
     * Checks if a group exists.
     *
     * @param int $groupId Group ID to check.
     * @return bool Returns true if the group exists, otherwise false.
     */
    public function exists($groupId) {
        $sql = "SELECT * FROM groups WHERE id = :groupId";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":groupId" => $groupId
        ]);

        return $query->rowCount() > 0;
    }

    /**
     * Retrieves users belonging to a specific group (students and teachers).
     *
     * @param int $groupId Group ID to fetch users.
     * @return array Returns an array of unique user IDs belonging to the group.
     */
    public function getUsers($groupId) {
        $students = $this->getStudents($groupId);
        $teachers = $this->getTeachers($groupId);

        $users = array_merge($students, $teachers);

        return array_unique($users);
    }

    /**
     * Retrieves students belonging to a specific group.
     *
     * @param int $groupId Group ID to fetch students.
     * @return array Returns an array of student user IDs.
     */
    public function getStudents($groupId) {
        $sql = "SELECT userId FROM studentsusersgroups WHERE groupId = :groupId";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":groupId" => $groupId
        ]);
        return $query->fetchAll(\PDO::FETCH_COLUMN);
    }

    /**
     * Retrieves teachers belonging to a specific group.
     *
     * @param int $groupId Group ID to fetch teachers.
     * @return array Returns an array of teacher user IDs.
     */
    public function getTeachers($groupId) {
        $sql = "SELECT userId FROM teachersusersgroups WHERE groupId = :groupId";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":groupId" => $groupId
        ]);
        return $query->fetchAll(\PDO::FETCH_COLUMN);
    }
}