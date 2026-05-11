<?php

    require_once __DIR__ . "/../config/database.php";

    class NewsModel {
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function getTotalCount() {
            $stmt = $this->pdo->query("SELECT COUNT(*) FROM news");
            return $stmt->fetchColumn();
        }

        public function getLatestNews() {
            $stmt = $this->pdo->query("SELECT * FROM news ORDER BY date DESC LIMIT 1");
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getNewsList($limit, $offset) {
            $stmt = $this->pdo->prepare("SELECT * FROM news ORDER BY date DESC LIMIT :limit OFFSET :offset");
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getNewsById($id) {
            $stmt = $this->pdo->prepare("SELECT * FROM news WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }