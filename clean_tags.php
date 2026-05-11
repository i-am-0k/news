<?php

    require_once 'config/database.php';

    $pdo = getDBConnection();

    $stmt = $pdo->query("SELECT id, announce, content FROM news");
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($news as $item) {
        $announce = $item['announce'];
        $content = $item['content'];

        $announce = str_replace(['<p>', '</p>'], ['[p]', '[/p]'], $announce);
        $content = str_replace(['<p>', '</p>'], ['[p]', '[/p]'], $content);
        
        $update = $pdo->prepare("UPDATE news SET announce = :announce, content = :content WHERE id = :id");
        $update->execute([
            ':announce' => $announce,
            ':content' => $content,
            ':id' => $item['id'],
        ]);
        echo "новость {$item['id']} очищена<br>";
    }
