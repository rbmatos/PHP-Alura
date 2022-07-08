<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;

class ExcluirCurso implements InterfaceControladorRequisicao
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        // Pegar o id do curso que será excluído
        // A função INPUT_GET seleciona os dados enviados pelo método GET
        // A função FILTER_VALIDATE_INT filtra somente números inteiros
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);        
        // Valida se a variável $id recebe um valor verdadeiro
        // A função is_null($id) retorna o valor null
        if (is_null($id) || $id === false) {
            header('Location: /excluir-cursos');
            return;
        }

        // Pega a referência do curso
        $curso = $this->entityManager->getReference(Curso::class, $id);
        // Remove o curso
        $this->entityManager->remove($curso);
        // Envia para o banco
        $this->entityManager->flush();
        // Redireciona
        header('Location: /listar-cursos');
    }

}