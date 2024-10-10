<?php
include "conn.php";
$conn = conexao("localhost", "root", "", "hackathon");
function veriflogin($nome, $senha, $tabela, $conn){
    $sql = "SELECT senha FROM $tabela WHERE nome = '$nome' AND senha = '$senha'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        // Exibe o erro da consulta para facilitar o debug
        die("Erro na consulta: " . mysqli_error($conn));
    }
    if(mysqli_num_rows($result) > 0){
        return true;
    } else {
        return false;
    }
}
?>