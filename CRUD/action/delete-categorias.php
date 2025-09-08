<?php
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

$id = intval($_GET['id']);

$sql = "DELETE FROM categorias WHERE CategoriaID = $id";
$result = mysqli_query($conn, $sql);
if($result === TRUE){
    echo "<script>alert('Categoria excluída com sucesso!'); window.location.href='../lista-categorias.php';</script>";
}
?>
