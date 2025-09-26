<?php
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

$acao = htmlspecialchars($_GET['acao']);
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}
switch ($acao){
    case 'excluir':
        $sql = "DELETE FROM funcionarios WHERE FuncionarioID = $id";
        $result = mysqli_query($conn, $sql);
        if($result === TRUE){
        echo "<script>alert('Funcionário excluído com sucesso!'); window.location.href='../lista-funcionarios.php';</script>";
        }else{
            if(strpos(mysqli_error($conn), 'foreign key constraint fails')){
                header("Location: ../lista-funcionarios.php?error=true");
            }
        }
    break;   
    case 'salvar':
        if(!empty($id)){
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
        }else{
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
        }
    break;
}
?>
