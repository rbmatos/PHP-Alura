<?php

namespace Alura\Banco\Modelo\Funcionario;

class Diretor extends Funcionario implements Autenticavel
{
        // Geter para recuperar calculo da bonificação
        public function calculaBonificacao(): float
        {
                return $this->recuperaSalario() * 2;
        }
        // Permissão de autenticação
        public function podeAutenticar(string $senha): bool
        {
            return $senha === '1234';
        }
}