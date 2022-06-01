<?php 
require_once '../partials/header.php';
session_start();
require_once '../DBclass.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if($id){
    $articleDao = new ArticleDaoMysql($pdo);
    $article = $articleDao->findByID($id);

    $categoryDao = new CategoryDaoMysql($pdo);
    $categories = $categoryDao->findAll();
    $category_name = $categoryDao->findByID($article->getCategoryID());
}else{
    header("Location: ./articles.php");
    exit;
}

?>

<section>
    <div class="container d-flex flex-column justify-content-center">
        <div class="title text-center">
            <h2 class="text-green">Criar Artigo</h2>
            <div class="row justify-content-center">
                <div class="col-6">
                    <?php if ( $_SESSION['error']): ?>
                    <div class="message-error">
                        <?=$_SESSION['error']; ?>
                        <?=$_SESSION['error'] = ''; ?>
                    </div>
                    <?php endif;?>     
                    <?php if ( $_SESSION['success']): ?>
                        <div class="message-success">
                            <?=$_SESSION['success']; ?>
                            <?=$_SESSION['success'] = ''; ?>
                        </div>
                    <?php endif;?>  
                </div>
            </div> 
        </div>
        <div class="form-default mb-40">
                <form action="../receive_forms/receive-edit-article.php" method="post">
                <input type="hidden" name="id" value="<?=$article->getID(); ?>" >
                <label for="title">Título:</label>
                <input type="text" name="title" id="title" value="<?=$article->getTitle(); ?>">
                <label for="name">Categoria:</label>
                <select name="category_id" required="required">
                    <option disabled value="" selected><?=$category_name->getTitle(); ?></option>
                    <?php foreach($categories as $item): ?>
                        <option value="<?=$item->getID(); ?>"><?=$item->getTitle(); ?></option>
                    <?php endforeach; ?> 
                </select>
                <label for="description">Conteúdo:</label>
                <textarea name="content" id="description"><?=$article->getTitle(); ?></textarea>
                <button type="submit">Editar</button>
            </form>
        </div>
    </div>
</section>

<?php require_once '../partials/footer.php'; ?>