<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

<main>

  <div class="container">
      <h1>Lista de Produtos</h1>
      <a href="./salvar-produtos.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT
            produtos.ProdutoID AS ProdutoID,
            produtos.Nome AS produto_nome,
            categorias.Nome AS categoria_nome,
            produtos.Preco AS produto_preco
            FROM
            produtos
            INNER JOIN
            categorias ON produtos.CategoriaID = categorias.CategoriaID";
            $result = mysqli_query($conn, $sql);
            foreach($result as $row){
              echo '
              <tr>
            <td>'.$row['ProdutoID'].'</td>
            <td>'.$row['produto_nome'].'</td>
            <td>'.$row['categoria_nome'].'</td>
            <td>R$ '.number_format($row['produto_preco'],2,',','.').'</td>
            <td>
            <a href="salvar-produtos.php?id='.$row['ProdutoID'].'" class="btn btn-edit">Editar</a>
            <a href="./action/produtos.php?id='.$row['ProdutoID'].'&acao=excluir" class="btn btn-delete" onclick="return confirm(\'Tem certeza que deseja excluir?\')">Excluir</a>
            </td>
            </tr>
            ';
            }
            ?>
        </tbody>
      </table>
    </div>

<?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>