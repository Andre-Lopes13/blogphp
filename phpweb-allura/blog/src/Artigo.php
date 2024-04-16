<?php
class Artigo
{
    private $mysql;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function exibirTodos(): array
    {
        $resultado = $this->mysql->query('SELECT id, titulo, conteudo 
        FROM artigos');
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);
        return $artigos;
    }

    public function encontrarArtigoPorId(string $id): array
    {
        $selecionaArtigo = $this->mysql->prepare('SELECT id, titulo, conteudo 
        FROM artigos WHERE id = ?');
        $selecionaArtigo->bind_param('s', $id);
        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();
        return $artigo;
    }
    public function adicionarArtigo(string $titulo, string $conteudo): void
    {
        $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES(?, ?)');
        $insereArtigo->bind_param('ss', $titulo, $conteudo);
        $insereArtigo->execute();
    }

    public function excluirArtigo(string $id): void
    {
        $excluiArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
        $excluiArtigo->bind_param('s', $id);
        $excluiArtigo->execute();
    }

    public function editarArtigo(string $id, string $titulo, string $conteudo): void
    {
        $editaArtigo = $this->mysql->prepare('UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?');
        $editaArtigo->bind_param('sss', $titulo, $conteudo, $id);
        $editaArtigo->execute();
    }
}
