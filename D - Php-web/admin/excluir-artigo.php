<?php

require_once '../conexao.php';
require_once '../src/Artigo.php';
require_once '../src/Redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Instanciar a classe Artigos, criando a classe e salvando ele em uma variável, nesse caso usamos $artigo
    $artigo = new Artigos($mysql);
    /* Referenciar a função exibirArtigos(), salvando a função dentro da variável $artigos,
    que recebeu o valor da classe Artigos salvo na variável $artigo */
    $excluirArtigo = $artigo->remover($_POST['id']);

    // Para redirecionar para a página index.php
    // Usamos a função redireciona, declarada no arquivo Redireciona.php
    redireciona('/PHP - Alura/D - Php-web/admin/index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Excluir Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Você realmente deseja excluir o artigo?</h1>
        <form method="post" action="excluir-artigo.php">
            <p>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                <button class="botao">Excluir</button>
            </p>
        </form>
    </div>
</body>

</html>