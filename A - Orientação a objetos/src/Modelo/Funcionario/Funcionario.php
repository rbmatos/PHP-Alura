<?php

namespace Alura\Banco\Modelo\Funcionario;
use Alura\Banco\Modelo\{CPF, Pessoa};

// o comando extends estende a classe pessoa para o arquivo atual
abstract class Funcionario extends Pessoa
{
    private $salario;

    public function __construct(string $nome, CPF $cpf, float $salario)
    {
    // a função parent:: faz referencia uma classe "mãe/Pai" chamada pessoa
        parent::__construct($nome, $cpf);
        $this->salario = $salario;
    }

    public function alteraNome(string $nome): void
    {
        $this->validaNome($nome);
        $this->nome = $nome;
    }

    public function recebeAumento(float $valorAumento): void
    {
        if($valorAumento < 0){
            echo "O aumento deve ser positivo";
            return;
        }

        $this->salario =+ $valorAumento;

    }

    //Geter para recuperar o salário
    public function recuperaSalario(): float
    {
        return $this->salario;
    }

    public function calculaBonificacao()
    {
        
    }
}
