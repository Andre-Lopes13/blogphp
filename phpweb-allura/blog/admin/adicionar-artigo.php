<?php
// verificando o método de requisição
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../config.php';
    require_once '../src/Artigo.php';
    require_once '../src/redireciona.php';
    // pegnado post com filter_input e sanitizando
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_STRING);
    // protegendo contra sql injection
    $titulo = mysqli_real_escape_string($mysql, $titulo);
    $conteudo = mysqli_real_escape_string($mysql, $conteudo);
    // instanciando a classe Artigo
    $artigo = new Artigo($mysql);
    // chamando o método adicionarArtigo
    $artigo->adicionarArtigo($titulo, $conteudo);
    // redirecionando
    redireciona('/admin/index.php');
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="post">
            <p>
                <label for="">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>