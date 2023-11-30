<?php


    namespace App\Models;

    class Reports {
        private $sql;

        public function __construct($sql) {
            $this->sql = $sql;
        }

        public function getReports() {
            $sql = "SELECT * FROM reports";
            $query = $this->sql->prepare($sql);
            $query->execute();
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function getReportsUsers() {
            $sql = "SELECT u.*, r.* FROM reports r JOIN users u ON r.userId = u.Id";
            $query = $this->sql->prepare($sql);
            $query->execute();
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function isActivated($reportId) {
            $sql = "SELECT marked FROM reports WHERE id = :reportId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":reportId" => $reportId
            ]);
            return $query->fetchAll(\PDO::FETCH_COLUMN)[0];
        }
        
        public function toggleReport($reportId){
            $sql = "UPDATE reports SET marked = !marked where id = :reportId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":reportId" => $reportId
            ]);
        }

        public function exists($reportId) {
            $sql = "SELECT * FROM reports WHERE id = :reportId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":reportId" => $reportId
            ]);
            return $query->rowCount() > 0;
        }

}