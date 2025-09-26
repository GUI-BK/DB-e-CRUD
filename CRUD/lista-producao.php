<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

?>
<style>
  .error_box{
    display: block;
    height: 100spx;
    width: 100%;
    background-color: #dc3545;
    border: 2px solid darkred;
    color: white;
    margin-top: 5px;
  }
</style>
  <main>

    <div class="container">
        <h1>Lista de Produção</h1>
        <a href="./salvar-producao.php" class="btn btn-add">Incluir</a>
        <?php
        if(isset($_GET['error'])){
          echo '<div class="error_box">
          <p>Este item não pode ser excluído</p>
          </div>
          ';

        }
        ?>
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
            <td>'.str_replace('-', '/', date("d/m/Y", strtotime($row['DataProducao']))).'</td>
            <td>
            <a href="salvar-producao.php?id='.$row['ProducaoID'].'" class="btn btn-edit">Editar</a>
            <a href="./action/producao.php?id='.$row['ProducaoID'].'&acao=excluir" class="btn btn-delete" onclick="return confirm(\'Tem certeza que deseja excluir?\')">Excluir</a>
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