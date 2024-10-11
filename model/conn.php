<?php
function conexao($server, $user, $pass, $db){
    $conn = mysqli_connect($server, $user, $pass, $db);
    return $conn;
}
?>