<?php
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

$acao = htmlspecialchars($_GET['acao']);
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}

switch ($acao){
    case 'excluir':
        $sql = "DELETE FROM categorias WHERE CategoriaID = $id";
        $result = mysqli_query($conn, $sql);
        if($result === TRUE){
        echo "<script>alert('Categoria excluída com sucesso!'); window.location.href='../lista-categorias.php';</script>";
        }else{
            if(strpos(mysqli_error($conn), 'foreign key constraint fails')){
                header("Location: ../lista-categorias.php?error=true");
            }
        }   
    break;
    case 'salvar':
        if(!empty($id)){
            if($_SERVER ['REQUEST_METHOD'] === 'POST'){
                $id = intval($_GET['id']);
                $nome = $_POST['nome'];
                $desc = $_POST['desc'];
            
                $sql = "UPDATE categorias SET Nome = '$nome', Descricao = '$desc' WHERE CategoriaID = $id";
                $result = mysqli_query($conn, $sql);
                if($result === TRUE){
                    echo "<script>alert('Categoria atualizada com sucesso!'); window.location.href='../lista-categorias.php';</script>";
                }
            }
        }else{
            if($_SERVER ['REQUEST_METHOD'] === 'POST'){
                $nome = $_POST['nome'];
                $desc = $_POST['desc'];
            
                $sql = "INSERT INTO categorias (Nome, Descricao) VALUES ('$nome','$desc')";
                $result = mysqli_query($conn, $sql);
                if($result === TRUE){
                    echo "<script>alert('Categoria inserida com sucesso!'); window.location.href='../lista-categorias.php';</script>";
                }
            }
        }
    break;
}
?>
