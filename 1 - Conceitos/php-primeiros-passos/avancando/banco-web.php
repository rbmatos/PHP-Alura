<?php

// determina que o arquivo referênciado é necessário para o funcionamento da aplicação
require_once 'funcoes.php';

/* Inclui o arquivo das funções no arquivo atual para que as funções chamadas nesse arquivo funcionem
include 'funcoes.php';
*/

$contasCorrentes = [
    '123.456.789-10' => [
        'titular' => 'vinicius',
        'saldo' => 1000
    ],
    '123.456.789-11' => [
        'titular' => 'joao',
        'saldo' => 5000
    ],
    '123.456.789-12' => [
        'titular' => 'rodrigo',
        'saldo' => 500
    ],
    '123.456.789-13' => [
        'titular' => 'andrea',
        'saldo' => 15000
    ]
];

// realizando depositos nas contas correntes, utilizando a função depositar
$contasCorrentes['123.456.789-10'] = depositar($contasCorrentes['123.456.789-10'], 1000);
$contasCorrentes['123.456.789-11'] = depositar($contasCorrentes['123.456.789-11'], 1000);
$contasCorrentes['123.456.789-12'] = depositar($contasCorrentes['123.456.789-12'], 1000);
$contasCorrentes['123.456.789-13'] = depositar($contasCorrentes['123.456.789-13'], 1000);

// realizando saque das contas correntes, utilizando a função sacar
$contasCorrentes['123.456.789-10'] = sacar($contasCorrentes['123.456.789-10'], 700);
$contasCorrentes['123.456.789-11'] = sacar($contasCorrentes['123.456.789-11'], 700);
$contasCorrentes['123.456.789-12'] = sacar($contasCorrentes['123.456.789-12'], 700);
$contasCorrentes['123.456.789-13'] = sacar($contasCorrentes['123.456.789-13'], 700);

// Apagando registros da lista utilizando a função do php unset
unset ($contasCorrentes['123.456.789-13']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contas Correntes</h1>

    <dl>
        <?php foreach($contasCorrentes as $cpf => $conta) { ?>
        <dt>
            <h3><?= $cpf; ?> - <?= $conta['titular']; ?></h3>
        </dt>
        <dd>
        Saldo: <?= $conta['saldo']; ?>
        </dd>
        <?php } ?>
    </dl>

</body>
</html>