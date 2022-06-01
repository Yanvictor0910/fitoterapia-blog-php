<?php
require '../DBclass.php';
session_start();

$articleDao = new ArticleDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if($id){
    $articleDao->delete($id);
    $_SESSION['success'] = 'Artigo excluido com sucesso';
    header("Location: ../pages/articles.php");
    exit;
}else{
    header("Location: ../pages/home.php");
    exit;
}