<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

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
?>