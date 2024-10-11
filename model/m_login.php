<?php
include "conn.php";
$conn = conexao("autorack.proxy.rlwy.net", "root", "IHxVRTKrqyXytVcvZjsxzyWgGacdMsoY", "hackathon");

function veriflogin($nome, $senha, $tabela, $conn) {
    // Prepara a declaração SQL para evitar injeção de SQL
    $stmt = $conn->prepare("SELECT senha FROM $tabela WHERE nome = ? AND senha = ?");
    $stmt->bind_param("ss", $nome, $senha);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
?>
