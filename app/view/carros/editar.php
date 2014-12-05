<form action="index.php?page=carro" method="post">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo $dado->id ?>">
    <label>
        Nome:
        <input type="text" name="nome" value="<?php echo $dado->nome ?>">
    </label>
    <label>
        Ano
        <input type="text" name="ano" value="<?php echo $dado->ano ?>">
    </label>
    <input type="submit" value="Salvar">
</form>