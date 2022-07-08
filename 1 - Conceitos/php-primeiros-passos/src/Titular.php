<?php

class Titular
{
    private string $cpf;
    private string $nome;

// função para parametrizar os dadosda conta criada
    public function __construct(string $cpf, string $nome)
    {
        $this->cpf = $cpf;
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }

// Função para recuperar cpf
    public function recuperaCpf(): string // retorno do tipo texto
    {
        return $this->cpf;
    }

// Função para recuperar nome
    public function recuperaNome(): string // retorno do tipo texto
    {
        return $this->nome;
    }

    private function validaNomeTitular(string $nomeTitular)
    {
        if (strlen($nomeTitular) < 3) {
            echo 'O nome do titular deve ter no mínimo 3 caractéres';
            exit();
        }
    }
}