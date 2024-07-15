<?php
include('protect.php');
if(!empty($_GET['id']))
{
    $id=$_GET['id'];
    $sql ="SELECT * FROM videos WHERE id=$id";
    $resultado = $ligacao->query($sql);

    if($resultado -> num_rows > 0){
        while ($register= $resultado->fetch_assoc()) {
            $video=$register['video'];
            $imag=$register['imag'];
            $title=$register['title'];
            $tema=$register['tema'];
            $imag1=$register['imag1'];
            $imag2=$register['imag2'];
            $imag3=$register['imag3'];
            $minut3=$register['minut3'];
            $descr=$register['descr'];
            $descr2=$register['descr2'];
            $descr3=$register['descr3'];
            $minut2=$register['minut2'];
            $minut=$register['minut'];
        }
    } else {
        header('location:Gerenciamento.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/editar.css">
    <link rel="icon" type="image/x-icon" href="../imags/logo/programacao.png">
    <title>Editar</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="row align-items-center mt-5 mb-3 ">
                <div class="col">
                    <h1>Gerenciamento</h1>
                </div>
                <div class="col-auto">
                    <a href="../projetos/Gerenciamento.php">
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
                    <div class="card-body ">
                        <h5 class="card-title text-center">Editar | Tabela</h5>
                        <form action="seve_edit.php" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="video" class="form-label">Escolha o vídeo:</label>
                                    <input type="file" class="form-control" id="video" name="video">
                                    <?php if (!empty($video)): ?>
                                        <small>Arquivo atual: <?php echo basename($video); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="imag" class="form-label">Escolha uma imagem:</label>
                                    <input type="file" class="form-control" id="imag" name="imag">
                                    <?php if (!empty($imag)): ?>
                                        <small>Arquivo atual: <?php echo basename($imag); ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tema" class="form-label">Tema</label>
                                    <input type="text" class="form-control" id="tema" name="tema" value="<?php echo $tema; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Título</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="imag1" class="form-label">Escolha uma imagem 1:</label>
                                    <input type="file" class="form-control" id="imag1" name="imag1">
                                    <?php if (!empty($imag1)): ?>
                                        <small>Arquivo atual: <?php echo basename($imag1); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="imag2" class="form-label">Escolha uma imagem 2:</label>
                                    <input type="file" class="form-control" id="imag2" name="imag2">
                                    <?php if (!empty($imag2)): ?>
                                        <small>Arquivo atual: <?php echo basename($imag2); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="imag3" class="form-label">Escolha uma imagem 3:</label>
                                    <input type="file" class="form-control" id="imag3" name="imag3">
                                    <?php if (!empty($imag3)): ?>
                                        <small>Arquivo atual: <?php echo basename($imag3); ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="descr" class="form-label">Descrição:</label>
                                    <input type="text" class="form-control" id="descr" name="descr" value="<?php echo $descr; ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="descr2" class="form-label">Descrição 2:</label>
                                    <input type="text" class="form-control" id="descr2" name="descr2" value="<?php echo $descr2; ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="descr3" class="form-label">Descrição 3:</label>
                                    <input type="text" class="form-control" id="descr3" name="descr3" value="<?php echo $descr3; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="minut" class="form-label">Minutos do vídeo 1:</label>
                                    <input type="text" class="form-control" id="minut" name="minut" value="<?php echo $minut; ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="minut2" class="form-label">Minutos do vídeo 2:</label>
                                    <input type="text" class="form-control" id="minut2" name="minut2" value="<?php echo $minut2; ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="minut3" class="form-label">Minutos do vídeo 3:</label>
                                    <input type="text" class="form-control" id="minut3" name="minut3" value="<?php echo $minut3; ?>" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
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
