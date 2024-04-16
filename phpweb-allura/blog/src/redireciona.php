<?php
function redireciona($url): void{
    header("Location: $url");
    die();
}