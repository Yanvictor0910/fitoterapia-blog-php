<?php 
require_once '../partials/header.php';
session_start();

require_once '../DBclass.php';

$categoryDao = new CategoryDaoMysql($pdo);
$categories = $categoryDao->findAll();

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
                <form action="../receive_forms/receive-article.php" method="post">
                <label for="title">Título:</label>
                <input type="text" name="title" id="title">
                <label for="name">Categoria:</label>
                <select name="category_id" required="required">
                    <option disabled value="" selected>Selecione uma categoria</option>
                    <?php foreach($categories as $item): ?>
                        <option value="<?=$item->getID(); ?>"><?=$item->getTitle(); ?></option>
                    <?php endforeach; ?> 
                </select>
                <label for="description">Conteúdo:</label>
                <textarea name="content" id="description"></textarea>
                <button type="submit">Criar</button>
            </form>
        </div>
    </div>
</section>

<?php require_once '../partials/footer.php'; ?>