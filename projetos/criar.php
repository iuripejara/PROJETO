<?php
include('protect.php');

if (isset($_POST['submit'])) {
    $tema = $_POST['tema'];
    $title = $_POST['title'];
    $descr = $_POST['descr'];
    $descr2 = $_POST['descr2'];
    $descr3 = $_POST['descr3'];
    $minut = $_POST['minut'];
    $minut2 = $_POST['minut2'];
    $minut3 = $_POST['minut3'];

    // Função para mover arquivos carregados e retornar o caminho relativo
    function uploadFile($fileInput, $uploadDir) {
        $fileName = basename($_FILES[$fileInput]['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES[$fileInput]['tmp_name'], $targetFilePath)) {
            return "" . str_replace("htdocs/PROJETO/", "", $targetFilePath);
        } else {
            echo "Erro ao mover o arquivo para o servidor.";
            return "";
        }
    }

    // Caminhos de upload específicos
    $videoUploadDir = '../videos/';
    $logoUploadDir = '../imags/logo/';
    $uploadDir = '../imags/';

    // Upload e obtenção de caminhos relativos para cada campo de arquivo
    $video = uploadFile('video', $videoUploadDir);
    $imag = uploadFile('imag', $logoUploadDir);
    $imag1 = uploadFile('imag1', $uploadDir);
    $imag2 = uploadFile('imag2', $uploadDir);
    $imag3 = uploadFile('imag3', $uploadDir);

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO videos (video, imag, title, tema, imag1, imag2, imag3, descr, descr2, descr3, minut, minut2, minut3) 
            VALUES ('$video', '$imag', '$title', '$tema', '$imag1', '$imag2', '$imag3', '$descr', '$descr2', '$descr3', '$minut', '$minut2', '$minut3')";

    if ($ligacao->query($sql) === TRUE) {
        header("location: Gerenciamento.php");
        exit;
    } else {
        echo "Erro ao inserir o registro: " . $ligacao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../estilos/editar.css">
    <link rel="icon" type="image/x-icon" href="../imags/logo/programacao.png">
    <title>Criar Novo Registro</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="row align-items-center mt-5 mb-3">
                <div class="col">
                    <h1>Criar Novo Registro</h1>
                </div>
                <div class="col-auto">
                    <a href="Gerenciamento.php">
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
                    <div class="card-body ">
                        <h5 class="card-title text-center">Criar Novo Registro</h5>
                        <form action="criar.php" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="video" class="form-label">Escolha o vídeo:</label>
                                    <input type="file" class="form-control" id="video" name="video" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="imag" class="form-label">Escolha uma imagem:</label>
                                    <input type="file" class="form-control" id="imag" name="imag" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tema" class="form-label">Tema</label>
                                    <input type="text" class="form-control" id="tema" name="tema" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Título</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="imag1" class="form-label">Escolha uma imagem 1:</label>
                                    <input type="file" class="form-control" id="imag1" name="imag1" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="imag2" class="form-label">Escolha uma imagem 2:</label>
                                    <input type="file" class="form-control" id="imag2" name="imag2" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="imag3" class="form-label">Escolha uma imagem 3:</label>
                                    <input type="file" class="form-control" id="imag3" name="imag3" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="descr" class="form-label">Descrição:</label>
                                    <input type="text" class="form-control" id="descr" name="descr" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="descr2" class="form-label">Descrição 2:</label>
                                    <input type="text" class="form-control" id="descr2" name="descr2" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="descr3" class="form-label">Descrição 3:</label>
                                    <input type="text" class="form-control" id="descr3" name="descr3" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="minut" class="form-label">Minutos do vídeo 1:</label>
                                    <input type="text" class="form-control" id="minut" name="minut" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="minut2" class="form-label">Minutos do vídeo 2:</label>
                                    <input type="text" class="form-control" id="minut2" name="minut2" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="minut3" class="form-label">Minutos do vídeo 3:</label>
                                    <input type="text" class="form-control" id="minut3" name="minut3" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <button name="submit" id="submit" type="submit" class="btn btn-primary">Enviar</button>
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
