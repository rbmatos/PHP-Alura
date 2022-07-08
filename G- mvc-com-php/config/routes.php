<?php

use Alura\Cursos\Controller\{FormularioInsercao, ListarCursos, SalvarCurso, ExcluirCurso, EditaCurso};

// Cria rotas para passarpara index.php
return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => SalvarCurso::class,
    '/excluir-curso' => ExcluirCurso::class,
    '/editar-curso' => EditaCurso::class
];

