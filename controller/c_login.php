<?php
include "m_login.php";
if(veriflogin($_POST['nome'], $_POST['senha'], $_POST['tabela'], $conn)){
header("Location: ../view/v_index.html");
}else{

}

?>