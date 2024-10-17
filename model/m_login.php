<?php
include "conn.php";
$conn = conexao();

function veriflogin($email, $senha, $tabela, $conn) {
    // Prepara a declaração SQL para evitar injeção de SQL
    $stmt = $conn->prepare("SELECT id_login FROM $tabela WHERE email = ? AND senha = ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

