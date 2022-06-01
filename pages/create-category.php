<?php 
require_once '../partials/header.php';
session_start();
?>

<section class="push-footer-bottom">
    <div class="container d-flex flex-column justify-content-center">
        <div class="title text-center">
            <h2 class="text-green">Criar Categoria</h2>
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
                <form action="../receive_forms/receive-category.php" method="post">
                <label for="title">Título:</label>
                <input type="text" name="title" id="title">
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</section>

<?php require_once '../partials/footer.php'; ?>