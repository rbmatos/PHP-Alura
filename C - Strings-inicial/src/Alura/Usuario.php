<?php

namespace App\Alura;

class Usuario
{
    private $nome;
    private $sobrenome;
    private $senha;
    private $tratamento;

    public function __construct(string $nome, string $senha, string $genero)
    {
        // O métod explode requer 3 argumentos
        // Ex: explode(delimitador, variável, qtde. de fragmentos)
        // O delimitador é o caracter chave da quebra da string, nese caso o delimitador foi o espaço
        // Esse método retorna um array de strings
        $nomeSobrenome = explode(" ", $nome, 2);

        // Faz validação de erro quando o usuário não digita o nome
        if ($nomeSobrenome[0] === "") {
            $this->nome = "Nome inválido";
        } else{
            // Atribui o valor nome no atributo nome e valor
            $this->nome = $nomeSobrenome[0];
        }
        
        // Faz validação de erro quando o usuário não digita o sobrenome
        if ($nomeSobrenome[1] === null) {
            $this->sobrenome = "Sobrenome inválido";
        } else{
            // Atribui o valor sobrenome no atributo sobrenome
            $this->sobrenome = $nomeSobrenome[1];
        }

        $this->validaSenha($senha);
        $this->adicionaTratamento($nome, $genero);

    }

    // Método para acessar nome
    public function getNome(): string
    {
        return $this->nome;
    }

    // Método para acessar sobrenome
    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    // Método para acessar a senha
    public function getSenha(): string
    {
        return $this->senha;
    }

    // Método para acessar a senha
    private function adicionaTratamento(string $nome, string $genero)
    {
        if ($genero === 'M') {
            $this->tratamento = preg_replace('/^(\w+)\b/', 'Sr.', $nome, 1);
        } else {
            $this->tratamento = preg_replace('/^(\w+)\b/', 'Srª.', $nome, 1);
        }
    }

    // Função criada para validar a senha de acordo com parametros estabelecidos
    // nesse caso os parâmetros são de que a senha contenha 6 ou mais caracteres e não aceite espaços
    public function validaSenha(string $senha): void
    {
        // A variável $tamanho_senha declarada para comparar o tamanho da senha
        // A função trim remove espaços, tabs, quebras de linha etc.
        $tamanho_senha = strlen(trim($senha));

        // Valida que a senha não pode ser menor que 6 caracteres
        if ($tamanho_senha >= 6) {
            // Retorna a senha cadastrada
            $this->senha = $senha;
        } else{
            $this->senha = "Senha inválida";
        }
        
    }

    public function getTratamento(): string
    {
        return $this->tratamento;
    }
}