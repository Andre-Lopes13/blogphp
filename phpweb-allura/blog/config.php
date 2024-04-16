<?php

$mysql = new mysqli('localhost', 'root', '130994', 'blog');
$mysql->set_charset('utf8');


if ($mysql == FALSE) {
    echo "Erro na conexão!";
} 
