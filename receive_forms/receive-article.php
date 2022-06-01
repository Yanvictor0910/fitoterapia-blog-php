<?php 
require '../DBclass.php';
session_start();

$articleDao = new ArticleDaoMysql($pdo);

$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

if ($title && $content && $category_id){
    $article = new Article();
    $article->setTitle($title);
    $article->setContent($content);
    $article->setCategoryID($category_id);

    $articleDao->create($article);

    $_SESSION['success'] = 'Artigo criado com sucesso';
    header("Location: ../pages/create-article.php");
}else{
    $_SESSION['error'] = 'Preencha todos os campos corretamente, por favor.';
    header("Location: ../pages/create-article.php");
}

?>
