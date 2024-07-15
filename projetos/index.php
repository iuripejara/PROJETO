<?php
include('protect.php');

$searchQuery = "";
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $searchQuery = " WHERE id LIKE '%$data%' OR video LIKE '%$data%' OR imag LIKE '%$data%' OR tema LIKE '%$data%' OR title LIKE '%$data%' OR imag1 LIKE '%$data%' OR imag2 LIKE '%$data%' OR imag3 LIKE '%$data%' OR minut LIKE '%$data%' OR minut2 LIKE '%$data%' OR minut3 LIKE '%$data%' OR descr LIKE '%$data%' OR descr2 LIKE '%$data%' OR descr3 LIKE '%$data%'";
}

$sql = "SELECT * FROM videos" . $searchQuery;
$resultado = $ligacao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Glegoo:wght@400;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" href="../estilos/naverbar.css">
    <link rel="icon" type="image/x-icon" href="../imags/logo/programacao.png">
    <title>Totelerant Lavel</title>
</head>
<body>
    <header>
        <div class="container d-flex justify-content-between align-items-center py-3">
            <div class="topo">
                <h1>Totelerant Lavel</h1>
            </div>
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                <i class="bi bi-list"></i>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="menu offcanvas-header d-flex justify-content-between">
                    <h5 id="offcanvasExampleLabel">Menu</h5>
                    <button id="closeButton" type="button" data-bs-dismiss="offcanvas" aria-label="Close" class="icon-button">
                        <i class="bi bi-x-circle-fill fs-3"></i>
                    </button>
                </div>
                <div class="menu-lateral offcanvas-body">
                    <ul>
                        <li class="item-menu"><a href=""><span class="icon"><i class="bi bi-house"></i></span><span class="txt-link">Dashboard</span></a></li>
                        <li class="item-menu"><a href="../projetos/videos.php"><span class="icon"><i class="bi bi-wallet2"></i></span><span class="txt-link">Wallet</span></a></li>
                        <?php if ($_SESSION['id'] == "adm") { ?>
                        <li class="item-menu"><a href="../projetos/Gerenciamento.php"><span class="icon"><i class="bi bi-gear"></i></span><span class="txt-link">Gerenciamento</span></a></li>
                        <?php } ?>
                        <li class="item-menu"><a href="../projetos/login.php"><span class="icon"><i class="bi bi-power"></i></span><span class="txt-link-Lougout">Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <hr>
    <main>
        <div class="container">
            <form class="row g-4 needs-validation my-4" novalidate>
                <div class="col-md-6">
                    <h1>Meus Vídeos</h1>
                </div>
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="search" id="search" class="form-control" placeholder="Palavra-chave">
                        <button id="searchData" type="button" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Container para exibir os cartões de vídeos -->
        <div class="container">
            <div class="row g-5 my-4 mb-2">
                <?php while ($registro = $resultado->fetch_assoc()) { ?>
                <div class="card-container col-md-4 d-flex justify-content-center">
                    <div id="cardpesquisa" class="card" style="width: 22rem; height: 22rem;">
                        <img src="<?php echo $registro['imag']; ?>" class="card-img-top" alt="Imagem do Vídeo">
                        <div class="card-body text-center mt-5">
                            <h5 class="card-title"><?php echo $registro['tema']; ?></h5>
                            <div class="play-video mt-4">
                                <hr class="card-hr border-5">
                                <a href='videos.php?id=<?php echo $registro['id']; ?>' class='play-video'>Acessar Vídeo <i class='bi bi-play-circle'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>

    <footer class="footer">
        <hr>
        <p>Copyright &copy;<?php echo date("Y"); ?>-Totelerant Lavel. Todos os direitos reservados.</p>
    </footer>
    <script src="../scripts/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
