<?php

namespace Alura\Banco\Modelo;

// O Método trait serve para criar cópias de métodos para não duplicar códigos ou abusar da herança
// É necessário referenciar a trait na classe em que deseja acessala usando o "use"
// Esta trait está sendo acessada nas classes Endereço, Pessoa
trait AcessoPropriedades
{
    // Método Mágico para criar métodos Geter's, para acessar atributos
    public function __get(string $nomeAtributo)
    {
        $metodo = 'recupera' . ucfirst($nomeAtributo);
        return $this->$metodo();
    }
}