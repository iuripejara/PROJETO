<?php
include('protect.php');
$sql = "SELECT * FROM utilizadores";
$resultado = $ligacao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../estilos/Gerenciamento.css">
    <link rel="icon" type="image/x-icon" href="../imags/logo/programacao.png">
    <title>Gerenciamento de utilizadores</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="row align-items-center mt-5 mb-3">
                <div class="col">
                    <h1>Gerenciamento</h1>
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
    <main class="mt-4">
        <div class="container">
            <div class="card border-0 p-4 shadow-sm">
                <div class="card-header text-center">
                    <h2 class="py-3">Tabela utilizadores</h2>
                </div>
                <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-center justify-content-md-end">
                        <a href="criar_utli.php" class="btn btn-secondary">
                            <i class="bi bi-plus-square-dotted pe-2"></i>Criar utilizadores
                        </a>
                    </div>
                </div>
                    <div class="table-responsive">
                        <table class="table table-dark table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">nome</th>
                                    <th scope="col">senha</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($registro = $resultado->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($registro['nome']) . "</td>";
                                    echo "<td>" . htmlspecialchars($registro['senha']) . "</td>";
                                    echo "<td>
                                        <a href='editar_utilizadores.php?id=" . htmlspecialchars($registro['id']) . "' class='btn btn-sm btn-primary mt-3'>
                                            <i class='bi bi-pencil-fill'></i>
                                        </a>
                                        <a href='deletar_utli.php?id=".htmlspecialchars($registro['id']) . "' class='btn btn-sm btn-danger mt-3 '>
                                            <i class='bi bi-trash3-fill'></i>
                                        </a>
                                    </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
