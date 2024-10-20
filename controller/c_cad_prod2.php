<?php
include_once "../model/m_cad_prod.php";
header('Content-Type: application/json');

// Código que deve ser executado apenas uma vez por sessão
$conn = conexao();
$stmt = $conn->prepare("SELECT id_categoria, nome_categoria FROM Categorias");
$stmt->execute();
$result = $stmt->get_result();

$categorias = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
} 
if (!empty($categorias)) {
    echo json_encode($categorias);
} else {
    echo json_encode(['error' => 'Nenhuma categoria encontrada.']);
}