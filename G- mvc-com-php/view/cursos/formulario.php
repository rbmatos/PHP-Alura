<?php include __DIR__ . '/../header.php' ; ?>

<form action="/salvar-curso <?= isset($curso) ? '?id=' . $curso->getId() : ''; ?>" method="POST">
    <div class="form-group">
        <label for="descricao">Descricao</label>
        <input type="text" class="form-control" id="descricao" name="descricao"
        value="<?= isset($curso) ? $curso->getDescricao() : ''; ?>">
    </div>
    <button class="btn btn-primary my-2">Salvar</button>
</form>

<?php include __DIR__ . '/../footer.php' ; ?>