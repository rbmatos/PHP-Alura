<?php

class ValidadorCPF
{
// fluxo dos métodos de validação
    public function ehValido($cpf)
    {
        if (!ValidadorCPF::ehCpf($cpf)) {
            return false;
        }

        $cpf_numeros = ValidadorCPF::removeFormatacao($cpf);
        
        if (!ValidadorCPF::verificarNumerosIguais($cpf_numeros)) {
            return false;
        }

        if (!ValidadorCPF::validarDigitos($cpf_numeros)) {
            return false;
        }

        return true;
    }

    // Valida o formato do CPF
    private function ehCpf($cpf)
    {
        $regex_cpf = "/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/";
        return preg_match($regex_cpf, $cpf);
    }

    // Remove os caracteres especiais
    private function removeFormatacao($cpf)
    {
        $somenteNumeros = str_replace([".", "-"], "", $cpf);
        return $somenteNumeros;
    }

    // Verifica números repetidos
    private function verificarNumerosIguais($cpf)
    {
        for ($i=0; $i <= 11 ; $i++) { 
            // str_repeat irá verificar a repetição dos caracteres informados na string
            if (str_repeat($i, 11) == $cpf) {
                return false;
            }
        }

        return true;
    }

    // Valida dígitos de verificação
    private function validarDigitos($cpf)
    {
        $primeiroDigito = 0;
        $segundoDigito = 0;

        // Verifica primeiro dígito
        for ($i=0, $peso=10; $i <= 8 ; $i++, $peso--) { 
            $primeiroDigito += $cpf[$i] * $peso;
            }

        $calculo_um = (($primeiroDigito % 11) < 2) ? 0 : 11 - ($primeiroDigito % 11);

        // Verifica segundo dígito
        for ($i=0, $peso=11; $i <= 9 ; $i++, $peso--) { 
            $segundoDigito += $cpf[$i] * $peso;
            }

        $calculo_dois = (($segundoDigito % 11) < 2) ? 0 : 11 - ($segundoDigito % 11);

        // Faz a validação dos dígitos de verificação
        if ($calculo_um != $cpf[9] || $calculo_dois != $cpf[10]) {
            return false;
        }

        return true;
    }

}