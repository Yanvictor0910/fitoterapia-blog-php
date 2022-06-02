<?php
require_once '../partials/header.php';
require_once '../DBclass.php';


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if($id){
    $articleDao = new ArticleDaoMysql($pdo);
    $article = $articleDao->findByID($id);

    $categoryDao = new CategoryDaoMysql($pdo);
    $category = $categoryDao->findByID($article->getCategoryID());
}else{
    header("Location: ./home.php");
    exit;
}

?>

<section>
    <div class="container">
        <div class="title text-center">
            <h2 class="text-green"><?=$article->getTitle(); ?></h2>
            <p class="text-right mt-30 mb-30 font-bold mr-20 subtitle">Categoria: <span><?=$category->getTitle(); ?></span></p>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="description">
                    <p class="mb-40"><?=$article->getContent(); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 justify-content-center d-flex flex-row">
                <a href="./edit-article.php?id=<?=$article->getID(); ?>" class="btn-default">Editar</a>
                <a onclick="return confirm('Tem certeza que deseja excluir?')" href="../receive_forms/delete-article.php?id=<?=$id; ?>" class="btn-delete">Excluir</a>
            </div>
        </div>
    </div>
</section>

<?php require_once '../partials/footer.php'; ?>