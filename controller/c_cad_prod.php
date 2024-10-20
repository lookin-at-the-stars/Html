<?php
include_once "../model/m_cad_prod.php";
$id_fornecedor = 1;
$conn = conexao();
// Corrigir a leitura do campo categorias
header('Content-Type: application/json');
if (isset($_POST['nome'], $_POST['preco'], $_POST['categorias'])) {
    if(cadProd($_POST['nome'],$_POST['preco'],1,$id_fornecedor, $conn)){
        echo json_encode(['status' => 'success', 'message' => 'Cadastro bem-sucedido']);
    }  else {
        echo json_encode(['status'=> 'error','message'=> 'Não foi possível cadastrar o produto.']);
    }
} 
// if (isset($_POST['nome'], $_POST['preco'], $_POST['categorias'])) {
//     if(cadProd($_POST['nome'],$_POST['preco'],1,$id_fornecedor, $conn)){
//         echo json_encode(['status' => 'success', 'message' => 'Cadastro bem-sucedido']);
//     }  else {
//         echo json_encode(['status'=> 'error','message'=> 'Não foi possível cadastrar o produto.']);
//     }
// } 
// $conn = conexao();
// $stmt = $conn->prepare("SELECT id_categoria, nome_categoria FROM Categorias");
// $stmt->execute();
// $result = $stmt->get_result();

// $categorias = [];

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $categorias[] = $row;
//     }
// } 
// if (!empty($categorias)) {
//     echo json_encode($categorias);
// } else {
//     echo json_encode(['error' => 'Nenhuma categoria encontrada.']);
// }