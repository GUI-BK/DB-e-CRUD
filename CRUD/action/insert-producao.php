<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

if($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $funcionario = $_POST['funcionario'];
    $produto = $_POST['produto'];
    $dataprod = $_POST['dataprod'];
    $dataent = $_POST['dataent'];

    $sql = "INSERT INTO producao (FuncionarioID, ProdutoID, DataProducao, DataEntrega)
            VALUES ('$funcionario','$produto','$dataprod','$dataent')";
    $result = mysqli_query($conn, $sql);
    if($result === TRUE){
        echo "<script>alert('Produção inserida com sucesso!'); window.location.href='../lista-producao.php';</script>";
    }
}
?>