<?php

/* ---------------------------- A função deste arquivo é criar as páginas de conteúdo ----------------------- */

/* Estabelece a conexão com os arquivos a seguir, como os arquivos estão em pastas diferentes é necessário
usar ../ antes do endereço
*/

require_once '../conexao.php';
require_once '../src/Artigo.php';
require_once '../src/Redireciona.php';

// 1 - Validar se o método passado ao servido é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 2 - Criando método para acessar o conteúdo dos metodos post do formulário
    $artigo = new Artigos($mysql);
    $artigo->adicionar($_POST['titulo'], $_POST['conteudo']);

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
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="post">
            <p>
                <label for="">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>