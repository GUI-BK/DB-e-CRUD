<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div class="container">
        <h1>Lista de Categorias</h1>
        <a href="./salvar-categorias.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Descrição</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM categorias";
            $result = mysqli_query($conn, $sql);
            foreach($result as $row){
              echo '
              <tr>
              <td>'.$row['CategoriaID'].'</td>
              <td>'.$row['Nome'].'</td>
              <td>'.$row['Descricao'].'</td>
              <td>
              <a href="salvar-categorias.php?id='.$row['CategoriaID'].'" class="btn btn-edit">Editar</a>
              <a href="./action/categorias.php?id='.$row['CategoriaID'].'&acao=excluir" class="btn btn-delete">Excluir</a>
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