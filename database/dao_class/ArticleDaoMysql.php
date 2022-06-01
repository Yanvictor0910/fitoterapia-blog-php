<?php

require_once './../functions.php';

class ArticleDaoMysql implements ArticleMethods{
    private $pdo;

    public function __construct($engine){
        $this->pdo = $engine;
    }

    public function create(Article $data){
        $sql = $this->pdo->prepare("INSERT INTO `articles` (`title`, `content`, `category_id`) VALUES (:title, :content, :category_id) ");
        $sql->bindValue(':title', $data->getTitle());
        $sql->bindValue(':content', $data->getContent());
        $sql->bindValue(':category_id', $data->getCategoryID());
        $sql->execute();

        $data->setID($this->pdo->lastInsertId());

        return $data;
    }

    public function findAll(){
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM `articles`");

        if ($sql->rowCount() > 0){
            $list = $sql->fetchAll();

            foreach ($list as $item){
                $article = new Article();
                $article->setID($item['id']);
                $article->setTitle($item['title']);
                $article->setContent($item['content']);
                $article->setCategoryID($item['category_id']);
                
                $array[] = $article;
            }
        }
        
        return $array;
    }

    public function search($info){
        $array = [];
        $sql = $this->pdo->prepare("SELECT * FROM `articles` WHERE `title` LIKE :title");
        $sql->bindValue(':title', "%$info%");
        $sql->execute();

        $list = $sql->fetchAll();

        foreach ($list as $item){
            $article = new Article();
            $article->setID($item['id']);
            $article->setTitle($item['title']);
            $article->setContent($item['content']);
            $article->setCategoryID($item['category_id']);
                
            $array[] = $article;
        }
    
        
        return $array;
    }

    public function findByID($id){
        $sql = $this->pdo->prepare("SELECT * FROM `articles` WHERE id = :id ");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $article = new Article();
            $article->setID($data['id']);
            $article->setTitle($data['title']);
            $article->setContent($data['content']);
            $article->setCategoryID($data['category_id']);

            return $article;
        }
    }

    public function update(Article $data){
        $sql = $this->pdo->prepare("UPDATE `articles` SET `title` = :title, `content` = :content, `category_id` = :category_id  WHERE id = :id" );
        $sql->bindValue(':title', $data->getTitle());
        $sql->bindValue(':content', $data->getContent());
        $sql->bindValue(':category_id', $data->getCategoryID());
        $sql->bindValue(':id', $data->getID());
        $sql->execute();

        return true;
    }

    public function delete($id){
        $sql = $this->pdo->prepare("DELETE FROM `articles` WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        return true;
    }
}