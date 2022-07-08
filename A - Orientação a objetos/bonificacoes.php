<?php

require_once 'autoload.php';

//Importa as classes
use Alura\Banco\Service\ControladorDeBonificacoes;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\{Desenvolvedor, Gerente, Diretor, EditorVideo};

// O construtor feito no modelo Funcionario tem como parametros, Nome, CPF, Cargo e Salario
$umFuncionario = new Desenvolvedor(
    'Rodrigo Matos',
    new CPF('123.456.789-10'),
    '1000'
);

$umFuncionario->sobeDeNivel();

$umaFuncionaria = new Gerente(
    'Andrea Matos',
    new CPF('123.456.789-11'),
    '3000'
);

$umDiretor = new Diretor(
    'Andrea Matos',
    new CPF('123.456.789-12'),
    '5000'
);

$umEditor = new EditorVideo(
    'Joao Matos',
    new CPF('123.456.789-13'),
    '1500'
);

$controlador = new ControladorDeBonificacoes;
$controlador->adicionaBonificacaoDE($umFuncionario);
$controlador->adicionaBonificacaoDE($umaFuncionaria);
$controlador->adicionaBonificacaoDE($umDiretor);
$controlador->adicionaBonificacaoDE($umEditor);

echo $controlador->recuperaTotal();