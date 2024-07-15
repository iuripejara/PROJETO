<?php

include('protect.php');
$sql ="SELECT * from videos where id=$_GET[id] ";
$resultado = $ligacao ->query($sql);
$registro = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/videos-styles.css">
    <link rel="icon" type="image/x-icon" href="../imags/logo/programacao.png">
    <title><?php echo $registro['title'] ?></title>
</head>
<body>
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="topo col text-center">
                <h1>Totelerant Lavel</h1>
            </div>
            <div class="col-auto">
                <a href="../projetos/index.php">
                    <button type="button" class="btn btn-outline-danger">
                        <i class="bi bi-arrow-return-left"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <hr>
    <main>
        <div class="container">
            <div id="tema_id" class="row ms-5">
                <div class="mt-4 me-3">
                    <h1><?php print $registro['tema'] ?></h1>
                </div>
            </div>  
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <!-- Coluna do vídeo -->
                <div class="col-sm-12 col-lg-6 mt-5">
                    <div class="video-container">
                        <video class="videos mt-5 w-100" controls>
                            <source src=<?php print $registro['video'] ?> type="video/mp4">
                        </video>
                    </div>
                </div>
                <!-- Lista de vídeos -->
                <div class="col-sm-12 col-lg-5 mt-lg-0 mt-sm-5 mt-2">
                    <div class="list-group" id="videoAccordion">
                        <a href="#video1" class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#videoAccordion">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?php print $registro['descr'] ?></h5>
                                <small class="minutos"><?php print $registro['minut'] ?></small>
                            </div>
                            <p class="mb-1"></p>
                            <small class="texto_small">verifique se código está igual à imagem</small>
                        </a>
                        <div class="collapse" id="video1">
                            <div class="card card-body">
                                <img src=<?php print $registro['imag1'] ?> alt="Image 1" class="img-fluid">
                            </div>
                        </div>
                        <a href="#video2" class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#videoAccordion">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?php print $registro['descr2'] ?></h5>
                                <small class="minutos"><?php print $registro['minut2'] ?></small>
                            </div>
                            <p class="mb-1"></p>
                            <small class="texto_small">verifique se código está igual à imagem</small>
                        </a>
                        <div class="collapse" id="video2">
                            <div class="card card-body">
                                <img src=<?php print $registro['imag2'] ?> alt="Image 2" class="img-fluid">
                            </div>
                        </div>
                        <a href="#video3" class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-parent="#videoAccordion">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?php print $registro['descr3'] ?></h5>
                                <small class="minutos"><?php print $registro['minut3'] ?></small>
                            </div>
                            <p class="mb-1"></p>
                            <small class="texto_small">verifique se código está igual à imagem</small>
                        </a>
                        <div class="collapse" id="video3">
                            <div class="card card-body">
                                <img src=<?php print $registro['imag3'] ?> alt="Image 3" class="img-fluid mt-2">
                            </div>
                        </div>
                    </div>
                    <img src="../imags/booots_2.png" alt="">
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>