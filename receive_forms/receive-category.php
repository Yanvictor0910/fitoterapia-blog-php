<?php
require '../DBclass.php';

session_start();

$categoryDao = new CategoryDaoMysql($pdo);

$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);

if ($title){
    $category = new Category();
    $category->setTitle($title);

    $categoryDao->create($category);

    $_SESSION['success'] = 'Categoria criada com sucesso';
    header("Location: ../pages/create-category.php");
}else{
    $_SESSION['error'] = 'Preencha o campo, por favor.';
    header("Location: ../pages/create-category.php");
}