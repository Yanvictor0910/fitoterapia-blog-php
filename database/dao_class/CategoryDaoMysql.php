<?php

require_once './../functions.php';

class CategoryDaoMysql implements CategoryMethods{
    private $pdo;

    public function __construct($engine){
        $this->pdo = $engine;
    }

    public function create(Category $data){
        $sql = $this->pdo->prepare("INSERT INTO `categories` (`title`) VALUES (:title)");
        $sql->bindValue(':title', $data->getTitle());
        $sql->execute();

        $data->setID($this->pdo->lastInsertId());

        return $data;
    }

    public function findAll(){
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM `categories`");

        if ($sql->rowCount() > 0){
            $list = $sql->fetchAll();

            foreach ($list as $item){
                $category = new Category();
                $category->setTitle($item['title']);
                $category->setID($item['id']);
                
                $array[] = $category;
            }
        }

        return $array;
    }

    public function findByID($id){
        $sql = $this->pdo->prepare("SELECT * FROM `categories` WHERE id = :id ");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0){
            $data = $sql->fetch();
            $category = new Category();
            $category->setID($data['id']);
            $category->setTitle($data['title']);
            
            return $category;
        }else{
            return false;
        }
    }

    public function update(Category $data){
        $sql = $this->pdo->prepare("UPDATE FROM `categories` SET `title` = :title WHERE id = :id");
        $sql->bindValue(':title', $data['title']);
        $sql->bindValue(':id', $data['id']);
        $sql->execute();

        return true;
    }

    public function delete($id){
        $sql = $this->pdo->prepare("DELETE FROM `categories` WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        return true;
    }
}