<?php
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

$acao = htmlspecialchars($_GET['acao']);
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}

switch ($acao){
    case 'excluir':
        $sql = "DELETE FROM producao WHERE ProducaoID = $id";
        $result = mysqli_query($conn, $sql);
        if($result === TRUE){
        echo "<script>alert('Produção excluída com sucesso!'); window.location.href='../lista-producao.php';</script>";
        }else{
            if(strpos(mysqli_error($conn), 'foreign key constraint fails')){
                header("Location: ../lista-producao.php?error=true");
            }
        }   
    break;
    case 'salvar':
        if(!empty($id)){
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
        }else{
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
        }
    break;
}
?>
