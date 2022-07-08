<?php

$contasCorrentes = [
    '123.456.789-10' => [
        'titular' => 'vinicius',
        'saldo' => 1000
    ],
    '123.456.789-11' => [
        'titular' => 'joao',
        'saldo' => 10000
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

// para incluir cadastro de novas contas
$contasCorrentes ['135.792.468-23'] = [
        'titular' => 'neiva',
        'saldo' => 3000
];

    // acessa o nome do titular
foreach ($contasCorrentes as $cpf => $conta) {
    echo $cpf . ' ' . $conta['titular'] . PHP_EOL;
}

// acessa o "indice (chave que no caso é um número de cpf)"
foreach ($contasCorrentes as $cpf => $conta) {
    echo $cpf . PHP_EOL;
}

// acessa o cpf e o nome do titular
foreach ($contasCorrentes as $cpf => $conta) {
    echo $cpf . ' ' . $conta['titular'] . PHP_EOL;
}