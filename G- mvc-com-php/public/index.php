<?php
                                /*******************************/
                                /*       FRONT CONTROLLER      */
                                /*******************************/

require_once __DIR__ . '/../vendor/autoload.php';
use Alura\Cursos\Controller\InterfaceControladorRequisicao;

// Atribui para a variável $caminho os dados passados pelo metodo POST
$caminho = $_SERVER['PATH_INFO'];

// Extende o arquivo routes atribuindo o seu valor para a variável $rotas
$rotas = require_once __DIR__ . '/../config/routes.php';

// Verifica se existe o caminho informado no array $rotas que está em routes.php
if (!array_key_exists($caminho, $rotas)) {
    // A função http_response_code retorna um erro http, nesse caso o 404, que foi o parametro passado para a função!
    http_response_code(404);
    exit();
}
// A variável $classeControladora recebe o valor da chave $caminho no array $rotas
$classeControladora = $rotas[$caminho];

// Ativando a interface "InterfaceControladorRequisicao"
/** @var InterfaceControladorRequisicao */

/* Instanciando a classe. Nesse caso como a variável $classeControladora recebe uma classe podemos
usar a variável para declarar uma interface. Fazemos esse uso nesse caso, porque a variável irá se
comportar como uma interface e irá receber os valores de mais de uma classe. */
$controlador = new $classeControladora();

// Chama a função que passa a requisição 
$controlador->processaRequisicao();

?>