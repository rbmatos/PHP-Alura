<?php

// função para sacar da conta corrente 
// as referências de array e float dentro dos parametros são a definição dos dados de entrada da função
// a referência de array fora dos parametros da função é a definição do tiopo do dado de saída da função
function sacar(array $conta, float $valorASacar):array
{
    if ($conta['saldo'] < $valorASacar) {
        exibeMensagem ('Saldo de ' . $conta['titular'] 
        . ' insuficiente, a operação não pode ser realizada!');
    } else {
    $conta['saldo'] -= $valorASacar;
    }

    return $conta;
}

// função para depositar na conta corrente
// as referências de array e float dentro dos parametros são a definição dos dados de entrada da função
// a referência de array fora dos parametros da função é a definição do tiopo do dado de saída da função
function depositar(array $conta, float $valorADepositar):array
{
    if($valorADepositar > 0){
        $conta['saldo'] += $valorADepositar;
    }
    else{
        exibeMensagem ('O valor do depósito não pode ser um valor negativo');
    }

    return $conta;
}


/* isolar código de menssagem (com essa função não é mais necessário adionar a quebra de linha no final 
de todas as menssagem, ela já é inserida pelo padrão da menssagem) */
// a referência de string dentro do parametro é a definição do dado de entrada da função
function exibeMensagem (string $mensagem) 
{
    echo $mensagem . '<br>';
}

function exibeConta(array $conta){
    echo "<li>{$conta['titular']} - R$ {$conta['saldo']}</li>";
}
