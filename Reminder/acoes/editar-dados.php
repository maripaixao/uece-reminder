<?php
require("../includes/conexao.php");

$id = $_POST['id'];
$tarefa = mb_strtoupper($_POST['tarefa']);
$tipo = $_POST['tipo'];
$prioridade = mb_strtoupper($_POST['prioridade']);

$sql = "UPDATE 
            tarefas
        SET
            tarefa='$tarefa',
            tipo='$tipo',
            prioridade='$prioridade'
        WHERE id=$id";

if(mysqli_query($conexao, $sql)){
    echo "<script>
            location.href='../index.php?msg=edit';
          </script>";
}
