<?php
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

$acao = htmlspecialchars($_GET['acao']);
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}

switch ($acao){
    case 'excluir':
        $sql = "DELETE FROM setor WHERE SetorID = $id";
        $result = mysqli_query($conn, $sql);
        if($result === TRUE){
        echo "<script>alert('Setor excluído com sucesso!'); window.location.href='../lista-setores.php';</script>";
        }
    break;
    case 'salvar':
        if(!empty($id)){
            if($_SERVER ['REQUEST_METHOD'] === 'POST'){
                $id = intval($_GET['id']);
                $nome = $_POST['nome'];
                $andar = $_POST['andar'];
                $cor = $_POST['cor'];
            
                $sql = "UPDATE setor SET Nome = '$nome', Andar = '$andar', Cor = '$cor' WHERE SetorID = $id";
                $result = mysqli_query($conn, $sql);
                if($result === TRUE){
                    echo "<script>alert('Setor atualizado com sucesso!'); window.location.href='../lista-setores.php';</script>";
                }
            }
        }else{
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
        }
    break;
}
?>
