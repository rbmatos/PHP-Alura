<?php

namespace Alura\Banco\Modelo;

abstract class Pessoa
{
// Para referenciar a trait criada em AcessoPropriedades
    use AcessoPropriedades;

    protected $nome;
    private $cpf;

    public function __construct(string $nome, CPF $cpf)
    {
        $this->validaNome($nome);
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function recuperaNome(): string
    {
        return $this->nome;
    }

    public function recuperaCpf(): string
    {
        return $this->cpf->recuperaNumero();
    }

// O Método final garante que esse método não pode ser sobrescrevido
    final protected function validaNome(string $nomeTitular)
    {
        if (strlen($nomeTitular) < 5) {
            echo "Nome precisa ter pelo menos 5 caracteres";
            exit();
        }
    }
}
