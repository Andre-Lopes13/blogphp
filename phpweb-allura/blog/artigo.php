<?php
    require 'config.php';
    include './src/Artigo.php';
    $obj_artigo = new Artigo($mysql);
    //pegando id com o filter_input
    $artigos = $obj_artigo->encontrarArtigoPorId(filter_input(INPUT_GET, 'id'));    
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>
            <?php echo $artigos['titulo']; ?>
        </h1>
        <p>
            <?php echo nl2br($artigos['conteudo']); ?>
        </p>
        <div>
            <a class="botao botao-block" href="index.php">Voltar</a>
        </div>
    </div>
</body>

</html>
