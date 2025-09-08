<?php
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

$id = intval($_GET['id']);

$sql = "DELETE FROM producao WHERE ProducaoID = $id";
$result = mysqli_query($conn, $sql);
if($result === TRUE){
    echo "<script>alert('Produção excluída com sucesso!'); window.location.href='../lista-producao.php';</script>";
}
?>
