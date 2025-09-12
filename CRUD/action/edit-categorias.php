<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

if($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $id = intval($_GET['id']);
    $nome = $_POST['nome'];
    $desc = $_POST['desc'];

    $sql = "UPDATE categorias SET Nome = '$nome', Descricao = '$desc' WHERE CategoriaID = $id";
    $result = mysqli_query($conn, $sql);
    if($result === TRUE){
        echo "<script>alert('Categoria atualizada com sucesso!'); window.location.href='../lista-categorias.php';</script>";
    }
}
?>