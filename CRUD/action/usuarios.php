<?php
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

$acao = htmlspecialchars($_GET['acao']);
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}

switch ($acao){
    case 'excluir':
        $sql = "DELETE FROM usuarios WHERE UsuarioID = $id";
        $result = mysqli_query($conn, $sql);
        if($result === TRUE){
        echo "<script>alert('Usuário excluído com sucesso!'); window.location.href='../lista-usuarios.php';</script>";
        }
    break;
    case 'salvar':
        if(!empty($id)){
            if($_SERVER ['REQUEST_METHOD'] === 'POST'){
                $id = intval($_GET['id']);
                $nome = $_POST['nome'];
                $user = $_POST['user'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
            
                $sql = "UPDATE usuarios SET Nome = '$nome', Usuario = '$desc', Email = '$email', Senha = '$senha' WHERE UsuarioID = $id";
                $result = mysqli_query($conn, $sql);
                if($result === TRUE){
                    echo "<script>alert('Usuário atualizado com sucesso!'); window.location.href='../lista-usuarios.php';</script>";
                }
            }
        }else{
            if($_SERVER ['REQUEST_METHOD'] === 'POST'){
                $nome = $_POST['nome'];
                $user = $_POST['user'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
            
                $sql = "INSERT INTO usuarios (Nome, Usuario, Email, Senha) VALUES ('$nome','$user','$email','$senha')";
                $result = mysqli_query($conn, $sql);
                if($result === TRUE){
                    echo "<script>alert('Usuário inserido com sucesso!'); window.location.href='../lista-usuarios.php';</script>";
                }
            }
        }
    break;
}
?>
