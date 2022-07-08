<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class SalvarCurso implements InterfaceControladorRequisicao
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();    
    }

    public function processaRequisicao(): void
    {   
        // Montar a descrição do curso para criar novo curso
        // A função INPUT_POST seleciona os dados enviados pelo método POST
        $descricao = filter_input(INPUT_POST, 'descricao');
        // Filtrando as informações do formulário
        $filtroDescricao = strip_tags($descricao);

        // Pegar o id do curso que será editado
        // A função INPUT_GET seleciona os dados enviados pelo método GET
        // A função FILTER_VALIDATE_INT filtra somente números inteiros
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);        
        // Valida se a variável $id recebe um valor verdadeiro
        // A função is_null($id) retorna o valor null
        if (!is_null($id) && $id !== false) {
            $curso = $this->entityManager->find(Curso::class, $id);
            $curso->setDescricao($filtroDescricao);
        } else {
            // Inserir no banco
            // Montar modelo dos cursos
            $curso = new Curso();
            $curso->setDescricao($filtroDescricao);
            $this->entityManager->persist($curso);
        }
        $this->entityManager->flush();
        // Redirecionar
        header("Location: /listar-cursos");
    }    
}