<?php
require("../includes/conexao.php");

$id = $_POST['id'];

$sql = "DELETE FROM tarefas WHERE id = $id";

if(mysqli_query($conexao, $sql)){
    echo '1';
} else {
    echo '2';
}