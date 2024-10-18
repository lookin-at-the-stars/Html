<?php
include "conn.php";
$conn = conexao();

function cadastro($nome, $email, $telefone, $senha, $conn) {
    // Verifica se o email já está cadastrado
    $stmt = $conn->prepare("SELECT email FROM Login WHERE email = ?");
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Se o email já estiver cadastrado, retorna falso
    if ($stmt->num_rows > 0) {
        $stmt->close(); // Fecha o statement
        return false; // Email já cadastrado
    }
    $stmt->close(); // Fecha o statement

    // Se o email não estiver cadastrado, insere os dados
    $conn->begin_transaction(); // Inicia uma transação
    try {
        // Inserindo na tabela Login
        $stmt = $conn->prepare("INSERT INTO Login(email, senha) VALUES (?, ?)");
        if (!$stmt) {
            throw new Exception("Erro na preparação da inserção na tabela Login: " . $conn->error);
        }
        $stmt->bind_param("ss", $email, $senha);

        if (!$stmt->execute()) {
            throw new Exception("Erro na execução da inserção na tabela Login: " . $stmt->error);
        }

        // Obtém o id_login inserido
        $id_login = $conn->insert_id;

        // Inserindo na tabela Clientes
        $stmt = $conn->prepare("INSERT INTO Clientes(nome, telefone, id_login) VALUES (?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Erro na preparação da inserção na tabela Clientes: " . $conn->error);
        }
        $stmt->bind_param("ssi", $nome, $telefone, $id_login);

        if (!$stmt->execute()) {
            throw new Exception("Erro na execução da inserção na tabela Clientes: " . $stmt->error);
        }

        // Confirma a transação
        $conn->commit();
        return true; // Cadastro bem-sucedido

    } catch (Exception $e) {
        // Se algo der errado, reverte a transação
        $conn->rollback();
        return false; // Erro no cadastro

    } finally {
        // Fecha o statement se estiver aberto
        if ($stmt) {
            $stmt->close();
        }
    }
}
