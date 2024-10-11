<?php
require __DIR__ . '/../vendor/autoload.php';  // Caminho correto para o autoload (ajuste o nível conforme a estrutura)

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../', 'db.env');   // Aponta para o diretório onde está o db.env
$dotenv->load();  // Carrega as variáveis do db.env

function conexao() {
    $server = $_ENV['DB_SERVER'];
    $user = $_ENV['DB_USER'];
    $pass = $_ENV['DB_PASS'];
    $db = $_ENV['DB_NAME'];

    $conn = mysqli_connect($server, $user, $pass, $db);

    if (!$conn) {
        die("Erro de conexão: " . mysqli_connect_error());
    }

    if (!mysqli_set_charset($conn, "utf8mb4")) {
        die("Erro ao definir o charset: " . mysqli_error($conn));
    }

    return $conn;
}
