<?php

function formataCpfCnpj($cpf_cnpj)
{
    $formatado = "";

    if (strlen($cpf_cnpj) == 11) {
        $formatado = substr($cpf_cnpj, 0, 3) . ".";    
        $formatado .= substr($cpf_cnpj, 3, 3) . ".";    
        $formatado .= substr($cpf_cnpj, 6, 3) . "-";    
        $formatado .= substr($cpf_cnpj, 9, 2);    
    } else {
        $formatado = substr($cpf_cnpj, 0, 2) . ".";
        $formatado .= substr($cpf_cnpj, 2, 3) . ".";
        $formatado .= substr($cpf_cnpj, 5, 3) . "/";
        $formatado .= substr($cpf_cnpj, 8, 4) . "-";
        $formatado .= substr($cpf_cnpj, 12, 2);
    }
    return $formatado;
}

function formataCep($cep)
{
    $formatado = "";
    $formatado = substr($cep, 0, 2) . ".";
    $formatado .= substr($cep, 2, 3) . "-";
    $formatado .= substr($cep, 5, 3);

    return $formatado;
}

function formatapreco($preco)
{
    $formatado = "R$ ";
    /*
    O método number_format Ex:.
    number_forta(variável, número de casas decimais, caracter especial de casas decimais, caracter especial de milhar)
    Formata a mascara do número nos padrões desejados.
    */
    $formatado .= number_format($preco, 2, ",", ".");

    return $formatado;
}

function formataData($data)
{
    $formatado = date("d/m/Y", strtotime($data));

    return $formatado;
}

function formataTel($telefone)
{
    $formatado = "";
    $formatado = "(" . substr($telefone, 0, 2) . ") ";
    $formatado .= substr($telefone, 2, 5) . "-";
    $formatado .= substr($telefone, 7, 4);

    return $formatado;
}