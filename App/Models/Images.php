<?php


    namespace App\Models;

    class Images {
        private $sql;

        public function __construct($sql) {
            $this->sql = $sql;
        }

        public function add($url) {
            $sql = "INSERT INTO images (url) VALUES (:url)";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":url" => $url
            ]);
            return $this->sql->lastInsertId();
        }

        public function getUrl($imageId) {
            $sql = "SELECT url FROM images WHERE id = :imageId";
            $query = $this->sql->prepare($sql);
            $query->execute([
                ":imageId" => $imageId
            ]);
            return $query->fetchAll(\PDO::FETCH_COLUMN);
        }
    }