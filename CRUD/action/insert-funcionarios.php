<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

if($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $datanasc = $_POST['datanasc'];
    $email = $_POST['email'];
    $salario = $_POST['salario'];
    $sexo = $_POST['sexo'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $cargo = $_POST['cargo'];
    $setor = $_POST['setor'];

    $sql = "INSERT INTO funcionarios (Nome, DataNascimento, Email, Salario, Sexo, CPF, RG, CargoID, SetorID)
            VALUES ('$nome','$datanasc','$email','$salario','$sexo','$cpf','$rg','$cargo','$setor')";
    $result = mysqli_query($conn, $sql);
    if($result === TRUE){
        echo "<script>alert('Funcionário inserido com sucesso!'); window.location.href='../lista-funcionarios.php';</script>";
    }
}
?>