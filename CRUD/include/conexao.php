<?php
$server = 'localhost';
$user = 'root';
$psw = '';
$dbname = 'empresa_top';

$conn = mysqli_connect($server, $user, $psw, $dbname);

if(!$conn){
    die('Erro na conexão: ' . mysqli_connect_error());
}

?>