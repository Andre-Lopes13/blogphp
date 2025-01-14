<?php 
include '../config.php';
require '../src/Artigo.php';
require_once '../src/redireciona.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $artigo = new Artigo($mysql);
    $artigo->editarArtigo(filter_input(INPUT_POST, 'id'), filter_input(INPUT_POST, 'titulo'), filter_input(INPUT_POST, 'conteudo'));
    redireciona('/admin/index.php');
}
    $artigo = new Artigo($mysql);
    $art = $artigo->encontrarArtigoPorId(filter_input(INPUT_GET, 'id'));


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar-artigo.php" method="post">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?php echo $art['titulo'];?>" />
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"> <?php echo $art['conteudo'];?> </textarea>
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $art['id'];?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>