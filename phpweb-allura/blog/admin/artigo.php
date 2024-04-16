<?php
    require 'config.php';
    include './src/Artigo.php';
    $obj_artigo = new Artigo($mysql);
    //pegando id com o filter_input
    $artigos = $obj_artigo->encontrarArtigoPorId(filter_input(INPUT_GET, 'id'));    
?>            
            
            
            <div id="artigo-admin">
                <p>Primeiros passos com Spring</p>
                <nav>
                    <a class="botao" href="admin/editar-artigo.html">Editar</a>
                    <a class="botao" href="admin/excluir-artigo.html">Excluir</a>
                </nav>
            </div>