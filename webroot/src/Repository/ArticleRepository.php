<?php
namespace src\Repository;

use src\Model\Article;

class ArticleRepository extends AbstractRepository {


    /**
     * Fetch all articles from the database
     *
     * @return array
     */
    public function fetchAll(): array
    {
        $this->connect();

        /** @var \PDOStatement $query */
        $query = $this->connection->query("SELECT * FROM articles ORDER BY `timestamp` DESC");
        $results = $query->fetchAll();

        $articles = [];
        foreach ($results as $result) {
            $articles[] = new Article($result['id'], $result['title'], $result['content'], $result['timestamp'], $result['image']);
        }

        return $articles;
    }

    /**
     * Insert an article into the database
     *
     * @param Article $article
     * @return boolean
     */
    public function insert(Article $article): bool
    {
        $this->connect();

        $query = $this->connection->prepare("INSERT INTO articles (title, content, image) VALUES (:title, :content, :image)");
        $query->execute([
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'image' => $article->getImage()
        ]);
        return true;
    }
}