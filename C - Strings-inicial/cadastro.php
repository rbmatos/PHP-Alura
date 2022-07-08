<?php

use App\Alura\{Contato, Usuario};

require_once 'autoload.php';

// 1 - Atribuindo os metodos das classes em variáveis para referenciar no código
$usuario = new Usuario($_POST['nome'], $_POST['senha'], $_POST['genero']);
$contato = new Contato($_POST['email'], $_POST['endereco'], $_POST['cep'], $_POST['telefone']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Curso Strings</title>
</head>
<body>

<div class="mx-5 my-5">
<h1>Cadastro feito com sucesso.</h1>
<p><?php echo htmlspecialchars($usuario->getTratamento()) ;?> seguem os dados de sua conta:</p>
<ul class="list-group">
    <li class="list-group-item">Primeiro nome: 
        <?php /* 2 - Referencia os metodos atribuídos as variáveis*/ echo htmlspecialchars($usuario->getNome()) ;?> 
    </li>
    <li class="list-group-item">Sobrenome: 
        <?php /* 2 - Referencia os metodos atribuídos as variáveis*/ echo htmlspecialchars($usuario->getSobrenome()) ;?> 
    </li>
    <li class="list-group-item">Usuário: 
        <?php /* 2 - Referencia os metodos atribuídos as variáveis*/ echo htmlspecialchars($contato->getUsuario()) ;?> 
    </li>
    <li class="list-group-item">Senha: 
        <?php /* 2 - Referencia os metodos atribuídos as variáveis*/ echo htmlspecialchars($usuario->getSenha()) ;?>
    </li>
    <li class="list-group-item">Telefone: 
        <?php /* 2 - Referencia os metodos atribuídos as variáveis*/ echo htmlspecialchars($contato->getTel()) ;?>
    </li>
    <li class="list-group-item">Email: 
        <?php /* 2 - Referencia os metodos atribuídos as variáveis*/ echo htmlspecialchars($contato->getEmail()) ;?>
    </li>
    <li class="list-group-item">Endereço: 
        <?php /* 2 - Referencia os metodos atribuídos as variáveis*/ echo htmlspecialchars($contato->getEnderecoCep()) ;?>
    </li>
</ul>
</div>
</body>
</html>
