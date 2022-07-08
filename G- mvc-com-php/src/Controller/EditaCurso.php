<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Doctrine\Common\Persistence\ObjectRepository;

class EditaCurso implements InterfaceControladorRequisicao
{

    /** @var ObjectRepository */
    
    private $repositorioCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioCursos = $entityManager->getRepository(Curso::class);
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
            header('Location: /listar-cursos');
            return;
        }
        
        // Pega o id do curso
        $curso = $this->repositorioCursos->find($id);
        // Declara o título da página
        $titulo =  'Editar ' . $curso->getDescricao();
        // chama a view
        require __DIR__ . '/../../view/cursos/formulario.php';
    }
}