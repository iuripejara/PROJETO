<?php
include('protect.php');
if (isset($_POST['upd'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    
    $nome = htmlspecialchars($nome);
    $senha = htmlspecialchars($senha);

    // Update query (consider using prepared statements for better security)
    $sqlupd ="UPDATE utilizadores SET nome='$nome', senha='$senha' WHERE id='$id'";
    $resultado = $ligacao->query($sqlupd);

   
    header('Location: utilizadores.php');
    exit();
}