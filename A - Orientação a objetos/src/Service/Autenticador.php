<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Autenticavel;

class Autenticador
{
    public function tentaLogin(Autenticavel $autenticavel, string $senha): void
    {
        if ($diretor->podeAutenticar($senha)) {
            echo "ok. Usuário logado no sistema";
        } else {
            echo "senha incorreta";
        }
    }
}