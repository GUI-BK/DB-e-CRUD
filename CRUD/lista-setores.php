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
        <h1>Lista de Setores</h1>
        <a href="./salvar-setores.php" class="btn btn-add">Incluir</a>
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
              <th>Nome</th>
              <th>Andar</th>
              <th>Cor</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $sql = "SELECT * FROM setor";
            $result = mysqli_query($conn, $sql);
            foreach($result as $row){
              echo '
              <tr>
            <td>'.$row['SetorID'].'</td>
            <td>'.$row['Nome'].'</td>
            <td>'.$row['Andar'].'</td>
            <td>'.$row['Cor'].'</td>
            <td>
            <a href="salvar-setores.php?id='.$row['SetorID'].'" class="btn btn-edit">Editar</a>
            <a href="./action/setores.php?id='.$row['SetorID'].'&acao=excluir" class="btn btn-delete" onclick="return confirm(\'Tem certeza que deseja excluir?\')">Excluir</a>
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