<?php

use Alura\Banco\Modelo\Endereco;

require_once 'autoload.php';

$umEndereco = new Endereco('cidade','bairro', 'rua', '17');
$outroEndereco = new Endereco('cidade2','bairro2', 'rua2', '27');

/* Para exibir apenas um atributo específico da classe. Utilizando o método mágico __get, declarado na classe endereço
echo $umEndereco->bairro;
exit();
 */

$umEndereco->cidade = "Nova Cidade";
echo $umEndereco;
exit();

echo $umEndereco . PHP_EOL;
echo $outroEndereco;