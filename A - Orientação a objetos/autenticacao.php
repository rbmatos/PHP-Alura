<?php

use Alura\Banco\Service\Autenticador;
use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Modelo\CPF;

require_once 'autoload.php';

$autenticador = new Autenticador();

$umDiretor = new Diretor(
    'Rodrigo', 
    new CPF('123.456.789-16'), 
    '10000'
);

$autenticador->tentaLogin($umDiretor, '1234');