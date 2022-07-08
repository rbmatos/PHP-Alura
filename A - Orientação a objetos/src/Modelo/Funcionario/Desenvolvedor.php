<?php

namespace Alura\Banco\Modelo\Funcionario;

class Desenvolvedor extends Funcionario
{
    public function sobeDeNivel(): float
    {
        $this->recebeAumento($this->recuperaSalario() * 0.75);
    }
    public function calculaBonificacao(): float
    {
        return 500.00;
    }
}