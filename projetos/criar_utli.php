<?php
include('protect.php');

// Inicializa as variáveis
$nome = $senha = '';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Validação simples (pode ser melhorada conforme necessário)
    if (empty($nome) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
        exit();
    }

    // Sanitiza os dados para evitar SQL Injection
    $nome = htmlspecialchars($nome);
    $senha = htmlspecialchars($senha);

    // Insere o novo usuário no banco de dados
    $sql = "INSERT INTO utilizadores (nome, senha) VALUES ('$nome', '$senha')";
    $resultado = $ligacao->query($sql);

    // Verifica se a inserção foi bem-sucedida
    if ($resultado) {
        // Redireciona para a página de utilizadores após a criação
        header('Location: utilizadores.php');
        exit();
    } else {
        echo "Erro ao criar o usuário: " . $ligacao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/editar.css">
    <link rel="icon" type="image/x-icon" href="../imags/logo/programacao.png">
    <title>Criar Novo Usuário</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="row align-items-center mt-5 mb-3">
                <div class="col">
                    <h1>Gerenciamento</h1>
                </div>
                <div class="col-auto">
                    <a href="utilizadores.php">
                        <button type="button" class="btn btn-outline-danger">
                            <i class="bi bi-arrow-return-left"></i> Voltar
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <hr>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Criar Novo Usuário</h5>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="senha" class="form-label">Senha</label>
                                    <input type="text" class="form-control" id="senha" name="senha" value="<?php echo htmlspecialchars($senha); ?>" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mb-3 mt-5">
                                <button type="submit" class="btn btn-primary">Criar Usuário</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
