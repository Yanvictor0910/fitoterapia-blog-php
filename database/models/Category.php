<?php

class Category{
    private $id;
    private $title;

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
}

interface CategoryMethods{
    public function create(Category $data);
    public function findAll();
    public function update(Category $data);
    public function delete($id);
}