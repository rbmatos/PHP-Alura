<?php

namespace Alura\Banco\Modelo;

/**
 * @packege Alura\Banco\Modelo
 * @property-read string $cidade
 * @property-read string $bairro
 * @property-read string $rua
 * @property-read string $numero
 */

final class Endereco
{
// Para referenciar a trait criada em AcessoPropriedades
    use AcessoPropriedades;

    private $cidade;
    private $bairro;
    private $rua;
    private $numero;

    public function __construct(string $cidade, string $bairro, string $rua, string $numero)
    {
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
    }

    public function recuperaCidade(): string
    {
        return $this->cidade;
    }

    public function recuperaBairro(): string
    {
        return $this->bairro;
    }

    public function recuperaRua(): string
    {
        return $this->rua;
    }

    public function recuperaNumero(): string
    {
        return $this->numero;
    }

    public function alteraCidade($novaCidade): void
    {
        $this->cidade = $novaCidade;
    }

    public function alteraBairro($novoBairro): void
    {
        $this->bairro = $novoBairro;
    }

    public function alteraRua($novaRua): void
    {
        $this->rua = $novaRua;
    }

    public function alteraNumero($novoNumero): void
    {
        $this->numero = $novoNumero;
    }

// Metodo para formatar a exibição do endreço, quando solicitado ao sistema
    public function __toString(): string
    {
        return "{$this->rua}, {$this->numero}, {$this->bairro}, {$this->cidade}";
    }



// Método Mágico para criar métodos Seter's, para acessar atributos
    public function __set(string $nomeAtributo, string $valor):void
    {
        $metodo = 'altera' . ucfirst($nomeAtributo);
        $this->$metodo($valor);
    }
}
