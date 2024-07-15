<?php
session_start();

// Destrói todas as variáveis de sessão
session_destroy();

// Redireciona para a página de login após o logout
header("Location: login.php");
exit(); // Certifique-se de que o script seja encerrado após o redirecionamento
?>
