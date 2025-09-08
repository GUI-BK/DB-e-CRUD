<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div class="container">
        <h1>Lista de Produções</h1>
        <a href="./salvar-producao.php" class="btn btn-add">Incluir</a> 
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Produto</th>
              <th>Produtor</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT
            producao.ProducaoID AS ProducaoID,
            produtos.Nome AS produto_nome,
            funcionarios.Nome AS funcionario_nome,
            producao.DataProducao AS DataProducao
            FROM
            producao
            INNER JOIN
            produtos ON producao.ProdutoID = produtos.ProdutoID
            INNER JOIN
            funcionarios ON producao.FuncionarioID = funcionarios.FuncionarioID";
            $result = mysqli_query($conn, $sql);
            foreach($result as $row){
              echo '
              <tr>
            <td>'.$row['ProducaoID'].'</td>
            <td>'.$row['produto_nome'].'</td>
            <td>'.$row['funcionario_nome'].'</td>
            <td>'.$row['DataProducao'].'</td>
            <td>
            <a href="#" class="btn btn-edit">Editar</a>
            <a href="./action/delete-producao.php?id='.$row['ProducaoID'].'" class="btn btn-delete">Excluir</a>
            </td>
            </tr>
            ';
            }
            ?>
          </tbody>
        </table>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>