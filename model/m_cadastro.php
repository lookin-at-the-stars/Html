<?php
include "conn.php";
$conn = conexao();

function cadastro($nome, $email, $telefone, $senha, $conn) {
    $stmt = $conn->prepare("SELECT id_login FROM Login WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows <= 0) {
        $stmt = $conn->prepare("INSERT INTO Login(email, senha) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $stmt = $conn->prepare("INSERT INTO Cliente(nome, telefone) VALUES (?, ?)");
        $stmt->bind_param("ss", $nome, $telefone);
        $stmt->execute();
    } else {
        return false;
    }
    
    
}