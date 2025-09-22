<?php
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

$acao = htmlspecialchars($_GET['acao']);
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}

switch ($acao){
    case 'excluir':
        $sql = "DELETE FROM cargos WHERE CargoID = $id";
        $result = mysqli_query($conn, $sql);
        if($result === TRUE){
    echo "<script>alert('Cargo excluído com sucesso!'); window.location.href='../lista-cargos.php';</script>";
    }else{
        if(strpos(mysqli_error($conn), 'foreign key constraint fails')){
            header("Location: ../lista-cargos.php?error=true");
        }
    }   
    
    break;
    case 'salvar':
        if(!empty($id)){
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
        }else{
            if($_SERVER ['REQUEST_METHOD'] === 'POST'){
            $nome = $_POST['nome'];
            $tetosal = $_POST['TetoSal'];
        
            $sql = "INSERT INTO cargos (Nome, TetoSalarial) VALUES ('$nome','$tetosal')";
            $result = mysqli_query($conn, $sql);
            if($result === TRUE){
                echo "<script>alert('Cargo inserido com sucesso!'); window.location.href='../lista-cargos.php';</script>";
            }
        } 
        break;
    }
}
?>
