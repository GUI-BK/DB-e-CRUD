<?php
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

$id = intval($_GET['id']);

$sql = "DELETE FROM cargos WHERE CargoID = $id";
$result = mysqli_query($conn, $sql);
if($result === TRUE){
    echo "<script>alert('Cargo excluído com sucesso!'); window.location.href='../lista-cargos.php';</script>";
}
?>
