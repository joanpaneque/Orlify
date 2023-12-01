<?php

namespace App\Models;

/**
 * Class Reports
 *
 * Handles database operations related to reports.
 */
class Reports {
    private $sql;

    /**
     * Reports constructor.
     *
     * @param \PDO $sql PDO database connection.
     */
    public function __construct($sql) {
        $this->sql = $sql;
    }

    /**
     * Retrieves all reports.
     *
     * @return array Returns an array of all reports.
     */
    public function getReports() {
        $sql = "SELECT * FROM reports";
        $query = $this->sql->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves users associated with reports.
     *
     * @return array Returns an array of users associated with reports.
     */
    public function getReportsUsers() {
        $sql = "SELECT u.*, r.* FROM reports r JOIN users u ON r.userId = u.Id";
        $query = $this->sql->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Checks if a report is activated.
     *
     * @param int $reportId Report ID to check activation status.
     * @return mixed Returns the activation status of the report.
     */
    public function isActivated($reportId) {
        $sql = "SELECT marked FROM reports WHERE id = :reportId";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":reportId" => $reportId
        ]);
        return $query->fetchAll(\PDO::FETCH_COLUMN)[0];
    }
    
    /**
     * Toggles the activation status of a report.
     *
     * @param int $reportId Report ID to toggle activation status.
     */
    public function toggleReport($reportId){
        $sql = "UPDATE reports SET marked = !marked where id = :reportId";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":reportId" => $reportId
        ]);
    }

    /**
     * Checks if a report exists.
     *
     * @param int $reportId Report ID to check existence.
     * @return bool Returns true if the report exists, otherwise false.
     */
    public function exists($reportId) {
        $sql = "SELECT * FROM reports WHERE id = :reportId";
        $query = $this->sql->prepare($sql);
        $query->execute([
            ":reportId" => $reportId
        ]);
        return $query->rowCount() > 0;
    }
}
