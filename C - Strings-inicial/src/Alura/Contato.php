<?php

// Define o namespace da classe
namespace App\Alura;

// Cria a classe Contato
class Contato
{
    // Inicia a variável $email
    private $email;
    private $endereco;
    private $cep;
    private $telefone;

    // Cria o método construtor da classe Contato
    public function __construct(string $email, string $endereco, string $cep, string $telefone)
    {
        
        $this->endereco = $endereco;
        $this->cep = $cep;

        // Valida se e-mail é verdadeiro
        if ($this->validaEmail($email) !== false) {
            // Atribui o valor da variável $email para a propriedade email 
            $this->email = $email;
        } else{
            $this->email = "E-mail invalido";
        }

        // Valida telefone
        if (!$this->telValido($telefone)) 
        {
            $this->telefone = "Telefone inválido";
        } else{
            $this->telefone = $telefone;
        }
        
    }

    // Método para pegar somente primeira parte do e-mail
    public function getUsuario(): string
    {
        // A função strpos quer 2 parametros
        // Ex. strpos(string, caracter parâmetro)
        // Essa função retorna a posição do caracter informado como parâmetro
        $posicaoArroba = strpos($this->email, "@");

        if ($posicaoArroba === false) {
            return "Usuário invalido";
        }

        // A função substr requer 3 parametros
        // Ex. substr(string, numero da posição inicial da extração, numero da posição final da extração)
        // Essa função retorna o intervalo selecionado da string
        return substr($this->email, 0, $posicaoArroba);
    }

    private function validaEmail(string $email)
    {
        // Verifica se e-mail é valido
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    // Formato padrão para o campo telefone "(41) 99911-4530"
    public function telValido($telefone)
    {
        if (strlen($telefone) === 15) {
            $regex_tel = "/^\([0-9]{2}\)[0-9]{5}\-[0-9]{4}$/";
            return preg_match($regex_tel, str_replace(" ","", $telefone));
        }
        return false;
    }

    public function getTel(): string
    {
        return $this->telefone;
    }

    // Função concatena o endereço e cep cadastrados para exibir em um único campo
    public function getEnderecoCep(): string
    {
        // A variável $endereco_cep criará um array com as strings endereco, cep
        $endereco_cep = [$this->endereco, $this->cep];
        // A função implode requer 2 argumentos
        // Ex. implode (caracter que separa as strings do array, array)
        return implode(" - CEP: ", $endereco_cep);
    }
}