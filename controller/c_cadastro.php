<?php
// include "../model/m_cadastro.php";
// // Verifica o login
// if (cadastro($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['senha'], $conn)) {
//     // Se o login for bem-sucedido, redireciona para a página principal
//     header("Location: ../view/v_home_page.html");
    
//     //exit();
// } else {
//     // Se o login falhar, redireciona de volta para v_login.html com mensagem de erro
//     header("Location: ../view/v_cadastro.html?error=Email já cadastrado!");
//     echo json_encode(['status' => 'error', 'message' => 'Email já cadastrado!']);
//     exit();
// }
include "../model/m_cadastro.php";

// Define o cabeçalho para JSON
header('Content-Type: application/json');

// Verifica o cadastro
if (cadastro($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['senha'], $conn)) {
    // Retorna um status de sucesso como JSON
    echo json_encode(['status' => 'success', 'message' => 'Cadastro bem-sucedido']);
} else {
    // Retorna um status de erro como JSON
    echo json_encode(['status' => 'error', 'message' => 'Email já cadastrado!']);
}
?>
