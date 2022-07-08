<?php

$conta1 = [
    'titular' => 'vinicius',
    'saldo' => 1000
];
$conta2 = [
    'titular' => 'joao',
    'saldo' => 10000
];
$conta3 = [
    'titular' => 'rodrigo',
    'saldo' => 500
];
$conta4 = [
    'titular' => 'andrea',
    'saldo' => 15000
];

$contasCorrentes = [$conta1, $conta2, $conta3, $conta4];

for ($i = 0; $i < count($contasCorrentes); $i++) { 
    echo $contasCorrentes[$i]['titular'] . PHP_EOL;
}