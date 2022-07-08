<?php

namespace Alura\Banco\Modelo\Funcionario;

class Gerente extends Funcionario implements Autenticavel
{
        // Geter para recuperar calculo da bonificação
        public function calculaBonificacao(): float
        {
                return $this->recuperaSalario();
        }

        // Permissão de autenticação
        public function podeAutenticar(string $senha): bool
        {
                return $senha === '4321';
        }
}