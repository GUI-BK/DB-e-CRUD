<?php
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

$acao = htmlspecialchars($_GET['acao']);
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}

switch ($acao){
    case 'excluir':
        $sql = "DELETE FROM produtos WHERE ProdutoID = $id";
        $result = mysqli_query($conn, $sql);
        if($result === TRUE){
        echo "<script>alert('Produto excluído com sucesso!'); window.location.href='../lista-produtos.php';</script>";
        }else{
            if(strpos(mysqli_error($conn), 'foreign key constraint fails')){
                header("Location: ../lista-produtos.php?error=true");
            }
        }   
    break;
    case 'salvar':
        if(!empty($id)){
            if($_SERVER ['REQUEST_METHOD'] === 'POST'){
                $id = intval($_GET['id']);
                $nome = $_POST['nome'];
                $preco = $_POST['preco'];
                $peso = $_POST['peso'];
                $desc = $_POST['desc'];
                $categoria = $_POST['categoria'];
            
                $sql = "UPDATE produtos SET Nome = '$nome', Preco = '$preco', Peso = '$peso', Descricao = '$desc', CategoriaID = '$categoria' WHERE ProdutoID = $id";
                $result = mysqli_query($conn, $sql);
                if($result === TRUE){
                    echo "<script>alert('Produto atualizado com sucesso!'); window.location.href='../lista-produtos.php';</script>";
                }
            }
        }else{
            if($_SERVER ['REQUEST_METHOD'] === 'POST'){
                $nome = $_POST['nome'];
                $preco = $_POST['preco'];
                $peso = $_POST['peso'];
                $desc = $_POST['desc'];
                $categoria = $_POST['categoria'];
            
                $sql = "INSERT INTO produtos (Nome, Preco, Peso, Descricao, CategoriaID)
                        VALUES ('$nome','$preco','$peso','$desc','$categoria')";
                $result = mysqli_query($conn, $sql);
                if($result === TRUE){
                    echo "<script>alert('Produto inserido com sucesso!'); window.location.href='../lista-produtos.php';</script>";
                }
            }
        }
    break;
}
?>
