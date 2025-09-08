<?php
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

$id = intval($_GET['id']);

$sql = "DELETE FROM setor WHERE SetorID = $id";
$result = mysqli_query($conn, $sql);
if($result === TRUE){
    echo "<script>alert('Setor excluído com sucesso!'); window.location.href='../lista-setores.php';</script>";
}
?>
