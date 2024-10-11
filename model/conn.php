<?php
function conexao($server, $user, $pass, $db): bool|mysqli{
    $conn = mysqli_connect(hostname: $server, username: $user, password: $pass, database: $db);
    return $conn;
}
?>