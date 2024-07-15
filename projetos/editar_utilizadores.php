<?php
include('protect.php'); 


$id = $nome = $senha = '';


if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch user data based on ID
    $sql ="SELECT * FROM utilizadores WHERE id=$id";
    $resultado = $ligacao->query($sql);

    if($resultado->num_rows > 0){
        $register = $resultado->fetch_assoc();
        $nome = $register['nome'];
        $senha = $register['senha'];
    } else {
        
        header('location:utilizadores.php');
        exit();
    }
} else {
    // Redirect to utilizadores.php if ID is not provided
    header('location:utilizadores.php');
    exit();
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
    <title>Editar</title>
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
                            <i class="bi bi-arrow-return-left"></i>
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
                        <h5 class="card-title text-center">Editar | Tabela</h5>
                        <form action="seve_edit_uti.php" method="post" enctype="multipart/form-data">
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
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="d-flex justify-content-center mb-3 mt-5">
                                <button name="upd" id="upd" type="submit" class="btn btn-primary">Enviar</button>
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
