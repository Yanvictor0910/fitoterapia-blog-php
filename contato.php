<?php require_once 'config.php'; ?>
<?php require_once './partials/header.php'; ?>

<section>
    <div class="container d-flex flex-column justify-content-center">
        <div class="title text-center">
            <h2 class="text-green">Contato</h2>
        </div>
        <div class="form-default">
                <form action="" method="post">
                <label for="name">Seu Nome:</label>
                <input type="text" name="name" id="name">
                <label for="email">Seu E-mail:</label>
                <input type="text" name="email" id="email">
                <label for="email">Informe o assunto que se trata:</label>
                <textarea name="description" id=""></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</section>

<?php require_once './partials/footer.php'; ?>