<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

if($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $id = intval($_GET['id']);
    $funcionario = $_POST['funcionario'];
    $produto = $_POST['produto'];
    $dataprod = $_POST['dataprod'];
    $dataent = $_POST['dataent'];

    $sql = "UPDATE producao SET FuncionarioID = '$funcionario', ProdutoID = '$produto', DataProducao = '$dataprod', DataEntrega = '$dataent' WHERE ProducaoID = $id";
    $result = mysqli_query($conn, $sql);
    if($result === TRUE){
        echo "<script>alert('Produção atualizada com sucesso!'); window.location.href='../lista-producao.php';</script>";
    }
}
?>