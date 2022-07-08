<?php

// Criando uma classe
// Classe é um modelo padrão de objetos
class Conta
{
    private string $titular;
    private float $saldo;
    private static float $numeroDeContas = 0; // contar número de contas criadas no sistema

// função para parametrizar os dadosda conta criada
public function __construct(Titular $titular)
{
    $this->titular = $titular;
    $this->saldo = 0;
    self::$numeroDeContas ++;
}

// Método destruct é executado toda vez que uma conta é eliminada da memória
public function __destruct()
{
    self::$numeroDeContas --;
}

// Função para realizar saques de contas correntes
    public function saca(float $valorASacar): void // não tem retorno
    {
        if ($valorASacar > $this->saldo) {
            echo 'Saldo insuficiente para saque';
            return;
        }
        
        $this->saldo -= $valorASacar;
    }

// Função para realizar depósitos em contas correntes
    public function deposita(float $valorADepositar): void // não tem retorno
    {
        if ($valorADepositar < 0) {
            echo 'O valor a depositar não pode ser menor que zero';
        }
        
        $this->saldo += $valorADepositar;
    }

// Função para realizar transferências entre contas correntes
    public function transfere(float $valorATransferir, conta $contaDestino): void // não tem retorno
    {
        if ($valorATransferir > $this->saldo) {
            echo 'Saldo insuficiente para transferência';
        }
        $this->saca($valorATransferir);
        $contaDestino->deposita($valorATransferir);
    }

// Função para recuperar saldo
    public function recuperaSaldo(): float // retorno do tipo float
    {
        return $this->saldo;
    }

//
    public function recuperaNomeTitular(): string
    {
        return $this->titular->recuperaNome();
    }

//
    public function recuperaCpfTitular(): string
    {
        return $this->titular->recuperaCpf();
    }

// método para acessar o atributo numeroDeContas da classe Conta
    public static function numeroDeContas()
    {
        return self::$numeroDeContas;
    }
}