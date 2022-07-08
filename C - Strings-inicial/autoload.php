<?php

spl_autoload_register(function($classe){

    // Adiciona um prefixo no projeto para evitar conflitos
    $prefixo = "App\\";

    // Informa o que tudo que está em app deve ser carregado apartir da pasta src
    $diretorio = __DIR__ . "/src/";

    // A função strncmp faz comparação entre duas strings
    // essa função requer 3 argumentos
    // Ex. strncmp(1º string, 2º string, limite da comparação)
    // Nesse caso iremos comparar somente até o tamanho da 1º string
    if (strncmp($prefixo, $classe, strlen($prefixo)) !== 0) {
        return;
    }

    
    //
    $namespace = substr($classe, strlen($prefixo));
    
    //
    $namespace_arquivo = str_replace('\\', DIRECTORY_SEPARATOR, $namespace);
    
    // 
    $arquivo = $diretorio . $namespace_arquivo . '.php';

    if (file_exists($arquivo)) {
        require $arquivo;
    }

});