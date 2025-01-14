<?php
require '../config.php';
require '../src/Artigo.php';
require_once '../src/redireciona.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Artigo($mysql);
    $artigo->excluirArtigo(filter_input(INPUT_POST, 'id'));
    redireciona('/admin/index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Excluir Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Você realmente deseja excluir o artigo?</h1>
        <form method="post" action="excluir-artigo.php">
            <p>
                <input type="hidden" name="id" value="<?php echo filter_input(INPUT_GET, 'id'); ?>" />
                <button class="botao">Excluir</button>
            </p>
        </form>
    </div>
</body>

</html>