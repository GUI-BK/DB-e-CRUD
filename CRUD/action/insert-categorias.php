<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

if($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO categorias (Nome, Descricao) VALUES ('$nome','$desc')";
    $result = mysqli_query($conn, $sql);
    if($result === TRUE){
        echo "<script>alert('Categoria inserida com sucesso!'); window.location.href='../lista-categorias.php';</script>";
    }
}
?>