<h1>Lista de Carros</h1>
<a href="/index.php?page=carro&novo=true">Adicionar</a>
<?php foreach($dados as $carro): ?>
    <h2>
        <?php echo $carro['nome']; ?>
        <a href="/index.php?page=carro&editar=true&id=<?php echo $carro['id']; ?>">Editar</a>
        <a href="/index.php?page=carro&excluir=true&id=<?php echo $carro['id']; ?>">Excluir</a>
    </h2>
<?php endforeach ?>