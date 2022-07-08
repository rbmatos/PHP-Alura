<?php

// Instanciando a conexão, feita no arquivo conexão.php
require_once '../conexao.php';

// Fazer o link com o código feito na classe Artigos, utilixando o include.
require_once '../src/Artigo.php';

// Instanciar a classe Artigos, criando a classe e salvando ele em uma variável, nesse caso usamos $artigo
$artigo = new Artigos($mysql);
/* Referenciar a função exibirArtigos(), salvando a função dentro da variável $artigos,
que recebeu o valor da classe Artigos salvo na variável $artigo */
$artigos = $artigo->exibirArtigos();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página administrativa</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <div id="container">
        <h1>Página Administrativa</h1>
        <div>
            <?php foreach ($artigos as $art) : ; ?>
                <div id="artigo-admin">
                    <p><?php echo $art['titulo']; ?></p>
                    <nav>
                        <a class="botao" href="editar-artigo.php?id=<?php echo $art['id']; ?>">Editar</a>
                        <a class="botao" href="excluir-artigo.php?id=<?php echo $art['id']; ?>">Excluir</a>
                    </nav>
                </div>
            <?php endforeach ?>
        <a class="botao botao-block" href="adicionar-artigo.php">Adicionar Artigo</a>
    </div>
</body>

</html>