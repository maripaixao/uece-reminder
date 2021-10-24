<?php
require("../includes/conexao.php");

$tarefa = mb_strtoupper($_POST["tarefa"]);
$tipo = $_POST['tipo'];
$prioridade = mb_strtoupper($_POST['prioridade']);

$sql = "INSERT INTO tarefas(tarefa, tipo, prioridade)
       VALUES ('$tarefa', '$tipo', '$prioridade')";

if(mysqli_query($conexao, $sql)){
    echo "<script>
            location.href='../index.php?msg=salvo';
         </script>";
} else {
    echo "<script>
            location.href='../index.php?msg=erro';
         </script>";
}


