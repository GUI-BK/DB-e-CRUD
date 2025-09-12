<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

if($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $id = intval($_GET['id']);
    $nome = $_POST['nome'];
    $datanasc = $_POST['datanasc'];
    $email = $_POST['email'];
    $salario = $_POST['salario'];
    $sexo = $_POST['sexo'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $cargo = $_POST['cargo'];
    $setor = $_POST['setor'];

    $sql = "UPDATE funcionarios SET Nome = '$nome', DataNascimento = '$datanasc', Email = '$email', Salario = '$salario', Sexo = '$sexo', CPF = '$cpf', RG = '$rg', CargoID = '$cargo', SetorID = '$setor' WHERE FuncionarioID = $id";
    $result = mysqli_query($conn, $sql);
    if($result === TRUE){
        echo "<script>alert('Funcionário atualizado com sucesso!'); window.location.href='../lista-funcionarios.php';</script>";
    }
}
?>