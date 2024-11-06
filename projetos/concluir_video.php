session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['video_id']) && isset($_POST['user_id'])) {
        $video_id = $_POST['video_id'];
        $user_id = $_POST['user_id'];

        include('protect.php'); // Conexão com o banco de dados

        try {
            // Verifica se o vídeo já foi concluído
            $sql = "SELECT * FROM videos_concluidos WHERE video_id = ? AND user_id = ?";
            $stmt = $ligacao->prepare($sql);
            $stmt->bind_param("ii", $video_id, $user_id);
            $stmt->execute();
            $resultado = $stmt->get_result();

            // Se o vídeo já foi concluído
            if ($resultado->num_rows > 0) {
                echo 'already_completed';
            } else {
                // Caso contrário, registre a conclusão do vídeo
                $sql_insert = "INSERT INTO videos_concluidos (video_id, user_id) VALUES (?, ?)";
                $stmt_insert = $ligacao->prepare($sql_insert);
                $stmt_insert->bind_param("ii", $video_id, $user_id);

                if ($stmt_insert->execute()) {
                    echo 'success';  // Vídeo concluído com sucesso
                } else {
                    echo 'error';  // Erro ao inserir no banco
                }
            }
        } catch (Exception $e) {
            echo 'error';  // Captura qualquer erro que ocorra
        }
    } else {
        echo 'error';  // Se os parâmetros não foram encontrados
    }
} else {
    echo 'invalid_request';  // Se a requisição não for POST
}
