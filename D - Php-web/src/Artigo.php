<?php

/* A finalidade desse arquivo que abriga a classe Artigos é de escrever o código PHP pe irá automatizar
a donstrução e edição de posts na pagina do blog e fazer a conexão com banco de dados
*/


class Artigos
{
    // Inicia a variável $mysql
    private $mysql;

    // Cria a função construtora
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    /*
    Método para enviar os dados para o banco de dados, esse método está relacionado
    com o arquivo adiciona-artigo.php
    */

    public function adicionar(string $titulo, string $conteudo): void
    {
        $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES(?, ?);');
        $insereArtigo->bind_param('ss', $titulo, $conteudo);
        $insereArtigo->execute();
    }

    // Método criado para excluir os artigos na pagina excluir-artigos
    public function remover(string $id): void
    {
        $removerArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
        $removerArtigo->bind_param('s', $id);
        $removerArtigo->execute();
    }

    public function exibirArtigos(): array
    {
        // Realiza consulta no banco de dados
        $resultado = $this->mysql->query('SELECT id, titulo, conteudo FROM artigos');
        // O método fetch_all retorna um array associativo com valor inteiro
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $artigos;
    }

    public function exibirId(string $id): array
    {
        // Realiza consulta no banco de dados
        $selecionaArtigo = $this->mysql->prepare("SELECT id, titulo, conteudo FROM artigos WHERE id = ?");
        // O método bind_param() irá associar o id com o ponte de interrogação
        $selecionaArtigo->bind_param('s', $id);
        // Para executar a  utilizaremos o método execute()
        $selecionaArtigo->execute();
        /* O método execute precisa do método get_result() para ser executado, e iremos retornar como um método
        associativo, utilizaremos o fetch_assoc() para declarar esse retorno
        */
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();

        return $artigo;
    }

    public function editar(string $id, string $titulo, string $conteudo): void
    {
                // Realiza consulta no banco de dados
                $editaArtigo = $this->mysql->prepare("UPDATE artigos SET titulo = ?, conteudo = ?  WHERE id = ?");
                // O método bind_param() irá associar o id com o ponte de interrogação
                $editaArtigo->bind_param('sss',$titulo, $conteudo, $id);
                // Para executar a  utilizaremos o método execute()
                $editaArtigo->execute();
    }
}
