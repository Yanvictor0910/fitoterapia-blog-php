<?php

class Article{
    private $id;
    private $title;
    private $content;
    private $category_id;

    public function setID($id){
        $this->id = $id;
    }

    public function getID(){
        return $this->id;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getContent(){
        return $this->content;
    }

    public function setCategoryID($category_id){
        $this->category_id = $category_id;
    }

    public function getCategoryID(){
        return $this->category_id;
    }
}

interface ArticleMethods{
    public function create(Article $data);
    public function findAll();
    public function update(Article $data);
    public function delete($id);
}