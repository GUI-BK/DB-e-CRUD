<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div class="container">
        <h1>Lista de Usuários</h1>
        <a href="./salvar-usuarios.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Usuario</th>
              <th>Email</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM usuarios";
            $result = mysqli_query($conn, $sql);
            foreach($result as $row){
              echo '
              <tr>
              <td>'.$row['UsuarioID'].'</td>
              <td>'.$row['Nome'].'</td>
              <td>'.$row['Usuario'].'</td>
              <td>'.$row['Email'].'</td>
              <td>
              <a href="salvar-usuarios.php?id='.$row['UsuarioID'].'" class="btn btn-edit">Editar</a>
              <a href="./action/usuarios.php?id='.$row['UsuarioID'].'&acao=excluir" class="btn btn-delete" onclick="return confirm(\'Tem certeza que deseja excluir?\')">Excluir</a>
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