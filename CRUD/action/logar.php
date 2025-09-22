<?php
session_start();

if($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $user = $_POST['user'];
    $senha = $_POST['senha'];

    $_SESSION['username'] = $user;
    $_SESSION['password'] = $senha;

    header("Location: ../index.php");
}
?>