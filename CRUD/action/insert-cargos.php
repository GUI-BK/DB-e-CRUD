<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

if($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $tetosal = $_POST['TetoSal'];

    $sql = "INSERT INTO cargos (Nome, TetoSalarial) VALUES ('$nome','$tetosal')";
    $result = mysqli_query($conn, $sql);
    if($result === TRUE){
        echo "<script>alert('Cargo inserido com sucesso!'); window.location.href='../lista-cargos.php';</script>";
    }
}
?>