<?php

require_once 'src/Conta.php';
require_once 'src/Titular.php';

$primeiraConta = new Conta(new Titular('123.456.789-10', 'rodrigo'));
$primeiraConta->deposita(500); 
$primeiraConta->saca(300);

echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$segundaConta = new Conta(new Titular('123.456.789-11', 'joao'));
var_dump($segundaConta);

echo Conta::numeroDeContas();