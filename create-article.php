<?php require_once './partials/header.php'; ?>

<section>
    <div class="container d-flex flex-column justify-content-center">
        <div class="title text-center">
            <h2 class="text-green">Criar Artigo</h2>
        </div>
        <div class="form-default mb-40">
                <form action="" method="post">
                <label for="name">Título:</label>
                <input type="text" name="title" id="name">
                <label for="name">Título:</label>
                <select name="category" required="required">
                    <option disabled value="" selected>Selecione uma categoria</option>
                    <option value="">Categoria 1</option>
                </select>
                <label for="description">Conteúdo:</label>
                <textarea name="content" id="description"></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</section>

<?php require_once './partials/footer.php'; ?>