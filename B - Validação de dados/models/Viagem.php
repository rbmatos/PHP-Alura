<?php

class Viagem
{

  var $origem;
  var $destino;
  var $data_ida;
  var $data_volta;
  var $classe;
  var $adultos;
  var $criancas;
  var $preco;

  function __construct(
    $origem,
    $destino,
    $data_ida,
    $data_volta,
    $classe,
    $adultos,
    $criancas,
    $preco

  ) {
    //referênciar os médos de validação na função __construct
    if (!$this->dataValida($data_ida)) throw new Exception("Data de ida inválida");

    if (!$this->dataValida($data_volta)) throw new Exception("Data de volta inválida");

    if (!$this->precoValido($preco)) throw new Exception("preço inválido");
    

    $this->origem = $origem;
    $this->destino = $destino;
    $this->data_ida = $data_ida;
    $this->data_volta = $data_volta;
    $this->classe = $classe;
    $this->adultos = $adultos;
    $this->criancas = $criancas;
    $this->preco = $this->convertePreco($preco);
  }


  public function dataValida($data)
  {

    // Verifica se o campo data está no padrão de 10 caractéres
    if (strlen($data) != 10) {
      return false;
    }

    // O método strpos procura a ocorrência de um caracter especial em uma string
    if (!strpos($data, "-")) {
      return false;
    }

    // O método explode separa a string em partes
    $partes = explode("-", $data);

    // Isola o valor de ano, mês e dia
    $ano = $partes[0];
    $mes = $partes[1];
    $dia = $partes[2];

    // Valida se o ano está no padrão de 4 caractéres
    if (strlen($ano) != 4) {
      return false;
    }

    // O método checkdate verifica se a data informada existe
    if (!checkdate($mes, $dia, $ano)) {
      return false;
    }

    $dataAtual = date("Y-m-d");

    // O método strtotime converte a data gerada no padrão de string para o padrão de data
    if (strtotime($data) < strtotime($dataAtual)) {
      return false;
    }

    return true;
  }

    // Método para validar valor monetário
    public function precoValido($preco)
    {
      $regex_preco = "/^[0-9]{1,3}([.][0-9]{3})*[,][0-9]{2}$/";
      return preg_match($regex_preco, $preco);
    }

    // Método para remover as formatações de preço "antes de enviar os dados para o banco"
    public function convertePreco($preco)
    {
      $numero_valido = str_replace(",", ".", $preco);
      $numero_valido = str_replace(".", "", substr($numero_valido, 0, -3)) . substr($numero_valido, -3);
      
      // A função doubleval converte uma string em double
      return doubleval($numero_valido);
    }
}
