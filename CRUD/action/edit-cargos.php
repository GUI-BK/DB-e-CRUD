<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

if($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $id = intval($_GET['id']);
    $nome = $_POST['nome'];
    $tetosal = $_POST['TetoSal'];

    $sql = "UPDATE cargos SET Nome = '$nome', TetoSalarial = '$tetosal' WHERE CargoID = $id";
    $result = mysqli_query($conn, $sql);
    if($result === TRUE){
        echo "<script>alert('Cargo atualizado com sucesso!'); window.location.href='../lista-cargos.php';</script>";
    }
}
?>