<?php
include_once   '../include/conexao.php';

if($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $user = $_POST['user'];
    $senha = $_POST['senha'];

    $stmt = mysqli_prepare($conn, "SELECT Senha FROM usuarios WHERE Usuario = ?");
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)){
        if(password_verify($senha, $row['Senha'])){
        session_start();
        $_SESSION['username'] = $user;
        header("Location: ../index.php");
        }else{
        echo "<script>alert('Usuário ou senha incorretos'); window.location.href='../index.php'</script>";
        session_destroy();
        }
    }
}
?>