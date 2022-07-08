<?php

// Importando as classes
require_once "ValidadorCPF.php";
require_once "ValidadorCNPJ.php";

class Cliente
{

  var $nome;
  var $cpf_cnpj;
  var $telefone;
  var $email;
  var $cep;
  var $endereco;
  var $bairro;
  var $numero;
  var $cidade;
  var $uf;

  function __construct(
    $nome,
    $cpf_cnpj,
    $telefone,
    $email,
    $cep,
    $endereco,
    $bairro,
    $numero,
    $cidade,
    $uf
  ) {

    // Instanciar a classe ValidadorCPF
    $validadorCPF = new ValidadorCPF();
    $validadorCNPJ = new ValidadorCNPJ();

    // Fluxo de validação
    if (!$this->cepValido($cep)) throw new Exception("CEP no formato inválido");

    if (!$this->telValido($telefone)) throw new Exception("Telefone no formato inválido");

    if (!$this->emailValido($email)) throw new Exception("e-mail no formato inválido");

    if (strlen($cpf_cnpj) == 14) {
      if (!$validadorCPF->ehValido($cpf_cnpj)) throw new Exception("CPF inválido");       
    } 
    else {
      if (strlen($cpf_cnpj) == 18){
        if (!$validadorCNPJ->ehValido($cpf_cnpj)) throw new Exception("CNPJ inválido");
      }
    }
    
    $this->nome = $nome;
    $this->cpf_cnpj = $this->removeFormatacao($cpf_cnpj);
    $this->telefone = $this->removeFormatacao($telefone);
    $this->email = $email;
    $this->cep = $this->removeFormatacao($cep);
    $this->endereco = $endereco;
    $this->bairro = $bairro;
    $this->numero = $numero;
    $this->cidade = $cidade;
    $this->uf = $uf;
  }

  // Formato padrão para o campo cep "80.010-000"
  public function cepValido($cep)
  {
    if (strlen($cep) === 10) {
      $regex_cep = "/^[0-9]{2}\.[0-9]{3}\-[0-9]{3}$/";
      return preg_match($regex_cep, $cep);
    }
    return false;
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

    // Formato padrão para o campo e-mail "email@email.com.br"
    public function emailValido($email)
    {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
      }
      return false;
    }

    // Método para remover as formatações de mascara "antes de enviar os dados para o banco"
    public function removeFormatacao($info)
    {
      $dado = str_replace([".", "-", "/", "(", ")"," "], "", $info);
      return $dado;
    }
}
