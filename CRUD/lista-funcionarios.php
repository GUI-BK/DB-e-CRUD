<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

<main>

  <div class="container">
      <h1>Lista de Funcionários</h1>
      <a href="./salvar-funcionarios.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Setor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT
          funcionarios.FuncionarioID AS FuncionarioID,
          funcionarios.Nome AS funcionario_nome ,         
          cargos.Nome AS cargo_nome,
          setor.Nome AS setor_nome
          FROM
          funcionarios
          INNER JOIN
          cargos ON funcionarios.CargoID = cargos.CargoID
          INNER JOIN
          setor ON funcionarios.SetorID = setor.SetorID";
          $result = mysqli_query($conn, $sql);
          foreach($result as $row){
            echo '
            <tr>
            <td>'.$row['FuncionarioID'].'</td>
            <td>'.$row['funcionario_nome'].'</td>
            <td>'.$row['cargo_nome'].'</td>
            <td>'.$row['setor_nome'].'</td>
            <td>
            <a href="salvar-funcionarios.php?id='.$row['FuncionarioID'].'" class="btn btn-edit">Editar</a>
            <a href="./action/funcionarios.php?id='.$row['FuncionarioID'].'&acao=excluir" class="btn btn-delete">Excluir</a>
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