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
<div class="container">
    <div class="row align-items-center">
        <div class="col text-center">
            <h1><?php echo $registro['title'] ?></h1>
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
    <div class="container-fluid">
        <div class="row video-section">
            <!-- Coluna principal do vídeo -->
            <div class="video-container mt-5">
                <video class="w-100" controls>
                    <source src="<?php echo $registro['video'] ?>" type="video/mp4">
                </video>
                <div class="text-center mt-3 mb-3">
                    <button id="completeButton" class="btn btn-primary">Clique aqui</button>
                </div>
            </div>

            <!-- Sidebar (barra de navegação de vídeos) -->
            <div class="sidebar mt-5">
                <div class=" list-group">
                    <!-- Vídeo 1 -->
                    <a href="#collapseVideo1" class="list-group-item list-group-item-action " data-bs-toggle="collapse">
                        <h5><?php echo $registro['descr'] ?></h5>
                        <small><?php echo $registro['minut'] ?></small>
                    </a>
                    <div class="collapse" id="collapseVideo1">
                        <div class="card card-body">
                            <!-- Imagem com funcionalidade para abrir o modal -->
                            <img src="<?php echo $registro['imag1'] ?>" alt="Image 1" class="img-fluid my-2" data-bs-toggle="modal" data-bs-target="#imageModal1">
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel1">Imagem Maior</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?php echo $registro['imag1'] ?>" alt="Image 1" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vídeo 2 -->
                    <a href="#collapseVideo2" class="list-group-item list-group-item-action" data-bs-toggle="collapse">
                        <h5><?php echo $registro['descr2'] ?></h5>
                        <small><?php echo $registro['minut2'] ?></small>
                    </a>
                    <div class="collapse" id="collapseVideo2">
                        <div class="card card-body">
                            <!-- Imagem com funcionalidade para abrir o modal -->
                            <img src="<?php echo $registro['imag2'] ?>" alt="Image 2" class="img-fluid my-2" data-bs-toggle="modal" data-bs-target="#imageModal2">
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imageModal2" tabindex="-1" aria-labelledby="imageModalLabel2" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel2">Imagem Maior</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?php echo $registro['imag2'] ?>" alt="Image 2" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vídeo 3 -->
                    <a href="#collapseVideo3" class="cardTop list-group-item list-group-item-action bg-" data-bs-toggle="collapse">
                        <h5><?php echo $registro['descr3'] ?></h5>
                        <small><?php echo $registro['minut3'] ?></small>
                    </a>
                    <div class="collapse" id="collapseVideo3">
                        <div class="card card-body">
                            <!-- Imagem com funcionalidade para abrir o modal -->
                            <img src="<?php echo $registro['imag3'] ?>" alt="Image 3" class="img-fluid my-2" data-bs-toggle="modal" data-bs-target="#imageModal3">
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imageModal3" tabindex="-1" aria-labelledby="imageModalLabel3" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel3">Imagem Maior</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?php echo $registro['imag3'] ?>" alt="Image 3" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="../scripts/concluido.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
