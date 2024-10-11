<?php
include "../model/m_login.php";

// Verifica o login
if (veriflogin($_POST['nome'], $_POST['senha'], 'usuarios', $conn)) {
    // Se o login for bem-sucedido, redireciona para a página principal
    header("Location: ../view/v_index.html");
    exit();
} else {
    // Se o login falhar, redireciona de volta para v_login.html com mensagem de erro
    header("Location: ../view/v_login.html?error=Login ou senha inválidos");
    exit();
}

