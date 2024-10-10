<?php
include "conn.php";
$conn = conexao("localhost", "root", "", "usuarios");
function veriflogin($nome, $senha, $tabela, $conn){
    $sql = "SELECT senha FROM $tabela WHERE nome == $nome AND senha == $senha";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        return true;
    }
    else{
        return false;
    }
}
?>