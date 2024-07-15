<?php

session_start();
include("conexao.php");

if (!isset($_SESSION["id"])) {
    // Redireciona para a página de login
    header("Location: login.php");
    exit(); // Certifique-se de que o script seja encerrado após o redirecionamento 
}
?>
