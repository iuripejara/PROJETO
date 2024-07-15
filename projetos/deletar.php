<?php
include('protect.php');
if(!empty($_GET['id']))
{
    $id=$_GET['id'];
    $sql ="SELECT * FROM videos WHERE id=$id";
    $resultado = $ligacao->query($sql);

    if($resultado -> num_rows > 0){
       $sqldeletar = "DELETE  FROM videos WHERE id=$id";
       $resultadodeletar = $ligacao->query($sqldeletar);
       if ($resultadodeletar) {
        // Redireciona para a página de gerenciamento após a exclusão bem-sucedida
        header('Location: Gerenciamento.php');
    } else {
        echo "Erro ao deletar o registro: " . $ligacao->error;
    }
} else {
    // Redireciona para a página de gerenciamento se o registro não for encontrado
    header('Location: Gerenciamento.php');
}
}
?>