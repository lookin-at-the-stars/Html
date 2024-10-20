<?php
include_once "../model/conn.php";
function cadProd($nome, $preco, $id_categoria, $id_fornecedor, $conn){
    $conn = conexao();
    $id_categoria = 1;
    $stmt = $conn->prepare("INSERT INTO Produtos (nome_produto, preco, id_categoria, id_fornecedor) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error); // Mostra o erro detalhado
    }
    $stmt->bind_param("ssii", $nome, $preco, $id_categoria, $id_fornecedor);
    $stmt->execute();
    $produto_id = $conn->insert_id;
    $dir = "../imagem/$produto_id/";
    if (!is_dir(filename: $dir)) {
        mkdir($dir, 0777, true);
    }
    if (isset($_FILES['imagens'])) {
        $total_imagens = count($_FILES['imagens']['name']); // Total de imagens enviadas

        for ($i = 0; $i < $total_imagens; $i++) {
            // Caminho temporário do arquivo
            $tmpFilePath = $_FILES['imagens']['tmp_name'][$i];

            if ($tmpFilePath != "") {
                // Definir o nome da imagem como sequencial (1.jpg, 2.jpg, etc.)
                $novoNomeImagem = ($i + 1) . '.' . pathinfo($_FILES['imagens']['name'][$i], PATHINFO_EXTENSION);

                // Caminho de destino da imagem
                $novoCaminho = $dir . $novoNomeImagem;

                // Mover o arquivo para o diretório de destino
                if (move_uploaded_file($tmpFilePath, $novoCaminho)) {
                    // Inserir o caminho da imagem no banco de dados
                    $stmt = $conn->prepare("INSERT INTO imagens_produtos (produto_id, caminho) 
                                           VALUES (?, ?)");
                    if (!$stmt) {
                        die("Erro na preparação da consulta: " . $conn->error); // Mostra o erro detalhado
                    }
                    $stmt->bind_param('is', $produto_id, $novoCaminho);
                    if($stmt->execute()){
                        return True;
                    } else{ return False;}
                }
            }
        }
    }
}



