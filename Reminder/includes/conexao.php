<?php

$conexao = mysqli_connect("localhost", "root", "");

if($conexao === false){
    die("Erro, não foi possível conectar com o servidor.");
}

mysqli_select_db($conexao, "reminder");