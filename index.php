<?php

    require_once 'config/database.php';
    require_once 'controllers/NewsController.php';

    $pdo = getDBConnection();
    $controller = new NewsController($pdo);

    $request = $_SERVER['REQUEST_URI'];
    $requestPath = parse_url($request, PHP_URL_PATH);

    if ($requestPath === '/' || $requestPath === '/index.php') {
        $controller->actionList();
    } elseif (preg_match('/^\/news\/(\d+)$/', $requestPath, $matches)) {
        $controller->actionDetail($matches[1]);
    } else {
        header('HTTP/1.0 404 Not Found');
        echo '404 - страница не найдена';
    }
?>
