<?php

class ValidadorCNPJ
{

    // fluxo dos métodos de validação
    public function ehValido($cnpj)
    {
        if (!ValidadorCNPJ::ehCNPJ($cnpj)) {
            return false;
        }

        $cnpj_numeros = ValidadorCNPJ::removeFormatacao($cnpj);
        
        if (!ValidadorCNPJ::verificarNumerosIguais($cnpj_numeros)) {
            return false;
        }

        if (!ValidadorCNPJ::validarDigitos($cnpj_numeros)) {
            return false;
        }

        return true;
    }

    // Valida o formato do CNPJ
    private function ehCNPJ($cnpj)
    {
        $regex_cnpj = "/^[0-9]{2}\.[0-9]{3}\.[0-9]{3}\/[0-9]{4}\-[0-9]{2}$/";
        return preg_match($regex_cnpj, $cnpj);
    }

    // Remove os caracteres especiais
    private function removeFormatacao($cnpj)
    {
        $somenteNumeros = str_replace([".", "/", "-"], "", $cnpj);
        return $somenteNumeros;
    }

    // Verifica números repetidos
    private function verificarNumerosIguais($cnpj)
    {
        for ($i=0; $i <= 14 ; $i++) { 
            // str_repeat irá verificar a repetição dos caracteres informados na string
            if (str_repeat($i, 14) == $cnpj) {
                return false;
            }
        }

        return true;
    }

        // Valida dígitos de verificação
        private function validarDigitos($cnpj)
        {
            $primeiroDigito = 0;
            $segundoDigito = 0;
    
            // Verifica primeiro dígito
            for ($i=0, $peso=5; $i <= 11 ; $i++, $peso--) { 
                $peso = ($peso < 2) ? 9 : $peso;
                $primeiroDigito += $cnpj[$i] * $peso;
                }
    
            $calculo_um = (($primeiroDigito % 11) < 2) ? 0 : 11 - ($primeiroDigito % 11);
    
            // Verifica segundo dígito
            for ($i=0, $peso=6; $i <= 12 ; $i++, $peso--) { 
                $peso = ($peso < 2) ? 9 : $peso;
                $segundoDigito += $cnpj[$i] * $peso;
                }
    
            $calculo_dois = (($segundoDigito % 11) < 2) ? 0 : 11 - ($segundoDigito % 11);
    
            // Faz a validação dos dígitos de verificação
            if ($calculo_um != $cnpj[12] || $calculo_dois != $cnpj[13]) {
                return false;
            }
    
            return true;
        }
}