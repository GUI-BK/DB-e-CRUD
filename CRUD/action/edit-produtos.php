<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

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
?>