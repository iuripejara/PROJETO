<?php 
include('protect.php');

// Verifique se a sessão de login está ativa
if (isset($_SESSION["id"])) {
    $username = $_SESSION["id"];  // Obtém o nome de usuário da sessão

    // Consulta para buscar o usuário logado
    $sql = "SELECT * FROM utilizadores WHERE nome = ?";
    $stmt = $ligacao->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $user = $resultado->fetch_assoc();  // Obter dados do usuário
    } else {
        echo "Usuário não encontrado!";
    }
} else {
    header("Location: login.php");  // Redireciona se o usuário não estiver logado
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="icon" type="image/x-icon" href="../imags/logo/programacao.png">
    <link rel="stylesheet" href="../estilos/Perfil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col text-center">
                <h2>Perfil do Utilizador</h2>
            </div>
            <div class="col-auto">
                <a href="../projetos/index.php">
                    <button type="button" class="btn btn-outline-danger">
                        <i class="bi bi-arrow-return-left"></i>
                    </button>
                </a>
            </div>
        </div>
        <hr class="bg-light">
    </div>
    
    <div class="container mt-5">
        
        <div class="card">
            <div class="card-body">
                <?php
                    echo "<h4 class='card-title'>Bem-vindo, " . htmlspecialchars($user['nome']) . "</h4>";
                    echo "<p class='card-text'>Total de videos concluidos : " . htmlspecialchars($user['id']) . "</p>"; // Exemplo de como mostrar o ID
                    
                    // Exibindo a foto de perfil
                    echo "<div>";
                    echo "<img src='" . htmlspecialchars($user['foto_perfil']) . "' class='perfil-img img-thumbnail' width='150'>";
                    echo "</div>";
                ?> 
                <div class="mb-3 mt-3 d-flex flex-column ">
                    <label for="foto_perfil">Atualizar Foto de Perfil:</label>
                    <form action="upload_foto.php" method="POST" enctype="multipart/form-data">
                        <!-- Input de arquivo escondido -->
                        <input type="file" name="foto_perfil" class="d-none" id="foto_perfil" accept="image/*" required>

                        <!-- Botão que chama o input de arquivo -->
                        <button type="button" class="btn btn-success" onclick="document.getElementById('foto_perfil').click();">Escolher Foto</button>

                        <!-- Botão de submit -->
                        <button type="submit" class="btn btn-primary mt-2">Salvar Foto</button>
                    </form>
                </div>
                    
            </div>
        </div>
    </div>
</body>
</html>
