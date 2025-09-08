<?php
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

$id = intval($_GET['id']);

$sql = "DELETE FROM funcionarios WHERE FuncionarioID = $id";
$result = mysqli_query($conn, $sql);
if($result === TRUE){
    echo "<script>alert('Funcionário excluído com sucesso!'); window.location.href='../lista-funcionarios.php';</script>";
}
?>
