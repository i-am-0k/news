<?php

    require_once __DIR__ . '/../models/NewsModel.php';
    require_once __DIR__ . '/../models/Paginator.php';

    class NewsController {
        private $model;

        public function __construct($pdo) {
            $this->model = new NewsModel($pdo);
        }

        public function actionList() {
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $itemsPerPage = 4;

            $latestNews = $this->model->getLatestNews();
            $newsList = $this->model->getNewsList($itemsPerPage, ($page - 1) * $itemsPerPage);
            $totalNews = $this->model->getTotalCount();
            $paginator = new Paginator($totalNews, $itemsPerPage, $page);
            
            $data = [
                'latestNews' => $latestNews,
                'totalNews' => $totalNews,
                'newsList' => $newsList,
                'currentPage' => $page,
                'itemsPerPage' => $itemsPerPage,
                'paginator' => $paginator,
            ];

            ob_start();
            extract($data);
            include __DIR__ . '/../views/news_list.php';
            $content = ob_get_clean();
            $title = 'Все новости';
            include __DIR__ . '/../views/layout.php';
            }
            
            
        public function actionDetail($id) {
            $news = $this->model->getNewsById($id);

            if (!$news) {
                header('HTTP/1.0 404 Not Found');
                echo '404 - страница не найдена';
            }

            $data = ['news' => $news];

            ob_start();
            extract($data);
            include __DIR__ . '/../views/news_detail.php';
            $content = ob_get_clean();
            $title = htmlspecialchars($news['title']);
            include __DIR__ . '/../views/layout.php';
        }
    }

?>