<?php
include "conn.php";
$conn = conexao();
$stmt = $conn->prepare("INSERT INTO CLIENTE(nome, senha) VALUES (?, ?)");
$stmt->bind_param("ss", $nome, $senha);
$stmt->execute();
