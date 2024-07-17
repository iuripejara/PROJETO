<?php
include('protect.php');

if (isset($_POST['upd'])) {
    $id = $_POST['id'];
    $tema = $_POST['tema'];
    $title = $_POST['title'];
    $descr = $_POST['descr'];
    $descr2 = $_POST['descr2'];
    $descr3 = $_POST['descr3'];
    $minut = $_POST['minut'];
    $minut2 = $_POST['minut2'];
    $minut3 = $_POST['minut3'];

    // Função para mover arquivos carregados e retornar o caminho relativo
    function uploadFile($fileInput, $uploadDir, $currentFile) {
        global $ligacao;

        // Verifica se o arquivo foi enviado
        if (!empty($_FILES[$fileInput]['name'])) {
            $fileName = basename($_FILES[$fileInput]['name']);
            $targetFilePath = $uploadDir . $fileName;

            // Move o arquivo para o diretório de destino
            if (move_uploaded_file($_FILES[$fileInput]['tmp_name'], $targetFilePath)) {
                return "" . str_replace("htdocs/trabalho/", "", $targetFilePath);
            } else {
                echo "Erro ao mover o arquivo para o servidor.";
                return $currentFile; // Mantém o arquivo atual se houver erro no upload
            }
        } else {
            return $currentFile; // Mantém o arquivo atual se nenhum novo arquivo for enviado a
        }
    }

    // Caminhos de upload específicos
    $videoUploadDir = '../trabalho/videos/';//teste 
    $uploadDir = '../trabalho/imags/';

    // Obtenção dos arquivos atuais do banco de dados
    $sql = "SELECT * FROM videos WHERE id = $id";
    $resultado = $ligacao->query($sql);

    if ($resultado->num_rows > 0) {
        $register = $resultado->fetch_assoc();

        // Atribuição dos valores atuais para manter se não houver upload de novos arquivos
        $video = $register['video'];
        $imag = $register['imag'];
        $imag1 = $register['imag1'];
        $imag2 = $register['imag2'];
        $imag3 = $register['imag3'];

        // Upload e obtenção de caminhos relativos para cada campo de arquivo
        $video = uploadFile('video', $videoUploadDir, $video);
        $imag = uploadFile('imag', $logoUploadDir, $imag);
        $imag1 = uploadFile('imag1', $uploadDir, $imag1);
        $imag2 = uploadFile('imag2', $uploadDir, $imag2);
        $imag3 = uploadFile('imag3', $uploadDir, $imag3);

        // Atualizar o banco de dados com os novos caminhos de arquivo
        $sqlupd = "UPDATE videos SET video='$video', imag='$imag', title='$title', tema='$tema', imag1='$imag1', imag2='$imag2', imag3='$imag3', descr='$descr', descr2='$descr2', descr3='$descr3', minut='$minut', minut2='$minut2', minut3='$minut3' WHERE id='$id'";
        
        if ($ligacao->query($sqlupd) === TRUE) {
            header("location: Gerenciamento.php");
            exit;
        } else {
            echo "Erro ao atualizar o registro: " . $ligacao->error;
        }
    } else {
        echo "Nenhum registro encontrado para o ID: $id";
    }
}
?>