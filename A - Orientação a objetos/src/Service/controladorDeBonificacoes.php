<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Funcionario\Funcionario;

class ControladorDeBonificacoes
{
    private $totalBonificacoes = 0;

    public function adicionaBonificacaoDe(Funcionario $funcionario)
    {
        $this->$totalBonificacoes += $funcionario->calculaBonificacao();
    }

    // Geter para recuperar o total da bonificação
    public function recuperaTotal(): float
    {
        return $this->totalBonificacoes;
    }
}
