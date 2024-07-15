<?php
session_start();

// Inclua o arquivo de conexão com o banco de dados
include("conexao.php");

// Verificar se o formulário foi submetido
if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta segura usando prepared statements para evitar SQL Injection
    $stmt = $ligacao->prepare("SELECT * FROM utilizadores WHERE nome=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        // Verificar a senha (deve ser comparada de maneira segura, como com password_verify se estiver usando hash)
        if ($password == $row['senha']) {
            // Login bem-sucedido, define a sessão para o usuário
            $_SESSION["id"] = $username;

            // Redireciona para a página protegida (index.php ou outra página segura)
            header("Location: index.php");
            exit();
        } else {
            // Senha incorreta
            $erro = "Senha incorreta";
        }
    } else {
        // Usuário não encontrado
        $erro = "Usuário não encontrado";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../estilos/style-login.css">
    <link rel="icon" type="image/x-icon" href="../imags/logo/programacao.png">
</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <h1 class="opacity">LOGIN</h1>
                <form action="" method="POST">
                    <input type="text" name="username" id="username" placeholder="Digite Seu Usuário" required />
                    <input type="password" name="password" id="password" placeholder="Digite Sua Senha" required />
                    <input type="submit" name="login" id="login" value="Entrar">
                    <?php if(isset($erro)) { echo "<div class='erro'>$erro</div>"; } ?>
                </form>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
</body>
</html>
