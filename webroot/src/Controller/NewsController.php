<?php
namespace src\Controller;

use src\Model\Article;
use src\Repository\ArticleRepository;

class NewsController extends BaseController{

    private ArticleRepository $articleRepository;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }

    /**
     * Run the controller
     *
     * @return void
     */
    public function run() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($_POST['action'] == 'update') {
                $this->updateArticle();
            } else if ($_POST['action'] == 'add') {
                $this->addArticle($_POST);
            }
        }

        $articles = $this->articleRepository->fetchAll();
        $this->loadView('News', $articles, true);
    }

    /**
     * Update an article
     *
     * @param array $data
     * @return void
     */
    private function addArticle(array $data) {
        $title = htmlspecialchars(strip_tags($data['title']));
        $content = htmlspecialchars(strip_tags($data['content']));
        $image = htmlspecialchars(strip_tags($data['image']));
    
        if ($this->isValidArticle($title, $content, $image)) {
            $article = new Article(0, $title, $content, '0', $image);
            $this->articleRepository->insert($article);
        } else {
            echo "Error while creating a article";
        }
    }
    
    private function isValidArticle($title, $content, $image) {
        if (empty($title) || empty($content) || empty($image)) {
            return false;
        } else { 
            return true;
        }
    }
}