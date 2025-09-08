<?php
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

$id = intval($_GET['id']);

$sql = "DELETE FROM produtos WHERE ProdutoID = $id";
$result = mysqli_query($conn, $sql);
if($result === TRUE){
    echo "<script>alert('Produto excluído com sucesso!'); window.location.href='../lista-produtos.php';</script>";
}
?>
