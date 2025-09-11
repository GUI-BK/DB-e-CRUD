<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

if($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $andar = $_POST['andar'];
    $cor = $_POST['cor'];

    $sql = "INSERT INTO setor (Nome, Andar, Cor) VALUES ('$nome','$andar','$cor')";
    $result = mysqli_query($conn, $sql);
    if($result === TRUE){
        echo "<script>alert('Setor inserido com sucesso!'); window.location.href='../lista-setores.php';</script>";
    }
}
?>