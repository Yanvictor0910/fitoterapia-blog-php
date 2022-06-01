<?php
require_once '../partials/header.php';
require_once '../DBclass.php';
session_start();

$search = filter_input(INPUT_GET, 'search');
trim($search);

$articleDao = new ArticleDaoMysql($pdo);

if ($search){
    $articles = $articleDao->search($search);
}else{
    $articles = $articleDao->findAll();   
}


?>

<section>
<div class="container">
        <div class="title text-center">
            <h2 class="text-green">Artigos</h2>
            <?php if ( $_SESSION['error']): ?>
                <div class="message-error text-center">
                    <?=$_SESSION['error']; ?>
                    <?=$_SESSION['error'] = ''; ?>
                </div>
            <?php endif;?>     
            <?php if ( $_SESSION['success']): ?>
                <div class="message-success text-center">
                    <?=$_SESSION['success']; ?>
                    <?=$_SESSION['success'] = ''; ?>
                </div>
            <?php endif;?>  
        </div>
        <div class="row justify-content-end mb-30">
            <div class="col-3">
                <div class="search-form">
                <form action="./articles.php" method="GET">
                    <input name="search" type="text" value="<?=$search ?>">
                    <button>Buscar</button>
                </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php if ($articles){ ?>
                <?php foreach($articles as $item ): ?>
                    <div class="col-4 mb-30">
                        <div class="box-article d-flex align-items-center justify-content-center flex-column">
                            <div class="title mb-40">
                                <h3 class="text-green"><?=$item->getTitle(); ?></h3>
                            </div>
                            <a href="./article-detail.php?id=<?=$item->getID(); ?>" class="btn-default">LER MAIS</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php } else { ?>
            <div class="col-12">
                <div class="articles-not-found push-footer-bottom">
                    <div class="title text-center">
                        <h3 style="font-size:42px" class="text-green">Nenhum artigo encontrado :(</h3>
                    </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php require_once '../partials/footer.php'; ?>