<?php

function getDBConnection() {
    try {
        $pdo = new PDO("mysql:host=localhost;port=3306;dbname=iamok_news;charset=utf8", "iamok_news", "NtcnjdjtPflfybt2026");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $ex) {
        echo "Ошибка подключения: " . $ex->getMessage();
    }
}

?>