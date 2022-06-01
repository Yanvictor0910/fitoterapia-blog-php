<?php 
require_once '../partials/header.php';
session_start();
?>


<section>
    <div class="container d-flex flex-column justify-content-center">
        <div class="title text-center">
            <h2 class="text-green">Contato</h2>  
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
        <div class="form-default">
                <form action="../receive_forms/receive-contact.php" method="post">
                <label for="name">Seu Nome:</label>
                <input type="text" name="name" id="name">
                <label for="email">Seu E-mail:</label>
                <input type="text" name="email" id="email">
                <label for="email">Informe o assunto que se trata:</label>
                <textarea name="content" id=""></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</section>

<?php require_once '../partials/footer.php'; ?>