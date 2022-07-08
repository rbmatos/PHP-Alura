<?php
/* ------------------------------------ Separando os códigos PHP do HTML --------------------------------------- */
/*
É boa prática de programação manter os códigos em arquivos separados, para facilitar a edição de códigos e também
evitar possíveis erros possam danificar a aplicação.

Nesse exercício isolamos os códigos PHP dos artigos em uma classe e encapsulamos esse código em uma função,
para acessar essa classe e a função criada é necessário serguir os procedimentos a seguir: 
*/

// Instanciando a conexão, feita no arquivo conexão.php
require_once 'conexao.php';

// Fazer o link com o código feito na classe Artigos, utilixando o include.
require_once 'src/Artigo.php';

// Instanciar a classe Artigos, criando a classe e salvando ele em uma variável, nesse caso usamos $artigo
$artigo = new Artigos($mysql);
/* Referenciar a função exibirArtigos(), salvando a função dentro da variável $artigos,
que recebeu o valor da classe Artigos salvo na variável $artigo */
$artigos = $artigo->exibirArtigos();

/* ------------------------------------------------------------------------------------------------------------- */


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>Meu Blog</h1>
        <?php foreach ($artigos as $artigo) : ?>
            <h2>
                <a href= "artigo.php?id=<?php echo $artigo['id'];?> ">
                    <?php echo $artigo['titulo']; ?>
                </a>
            </h2>
            <p>
            <?php echo nl2br($artigo['conteudo']); ?>
            </p>
        <?php endforeach ?>
    </div>
</body>

</html>