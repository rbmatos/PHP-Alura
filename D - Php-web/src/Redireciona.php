<?php

function redireciona(string $url): void
{
    // Para redirecionar para a página adicionar-artigo.php
    // usabdo a função header()
    header("Location: $url");
    die();
}