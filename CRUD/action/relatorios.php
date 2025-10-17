<?php
include_once './include/logado.php';
include_once './include/conexao.php';

$sql = "SELECT
 produtos.Nome AS produto_nome,
 SUM(producao.Quantidade) AS quantidade_total
 FROM produtos
 INNER JOIN producao ON produtos.ProdutoID = producao.ProdutoID
 GROUP BY produto_nome
 ";
$result = mysqli_query($conn, $sql);

 $produtos = [];
 $quantidades = [];
 $total_geral = 0;

 while($row = mysqli_fetch_assoc($result)){
    $produtos[] = $row['produto_nome'];
    $quantidades[] = $row['quantidade_total'];
    $total_geral += $row['quantidade_total'];
 }

 $percentuais = [];
foreach($quantidades as $qtd){
    $percentuais[] = round(($qtd / $total_geral) * 100, 2);
}
?>

