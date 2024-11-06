<?php
include('protect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto_perfil'])) {
    $username = $_SESSION['id'];  // Nome do usuário logado

    // Diretório para salvar a imagem de perfil
    $diretorio = "imagens/perfil/";
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true);
    }

    // Gerar um nome único para a imagem
    $extensao = pathinfo($_FILES['foto_perfil']['name'], PATHINFO_EXTENSION);
    $novoNome = $username . "_perfil." . $extensao;
    $caminhoArquivo = $diretorio . $novoNome;

    // Verificar se o arquivo é uma imagem válida
    $tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array(strtolower($extensao), $tiposPermitidos)) {
        // Mover o arquivo para o diretório de imagens de perfil
        if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $caminhoArquivo)) {
            // Atualizar a imagem de perfil no banco de dados
            $sql = "UPDATE utilizadores SET foto_perfil = ? WHERE nome = ?";
            $stmt = $ligacao->prepare($sql);
            $stmt->bind_param("ss", $caminhoArquivo, $username);
            if ($stmt->execute()) {
                header("Location: perfil.php");
                exit();
            } else {
                echo "Erro ao atualizar a imagem no banco de dados.";
            }
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        echo "Formato de imagem não permitido. Use jpg, jpeg, png ou gif.";
    }
} else {
    header("Location: perfil.php");
    exit();
}
?>