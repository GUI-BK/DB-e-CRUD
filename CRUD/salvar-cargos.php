<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>
<?php
if(isset($_GET['id'])){
  
  $id = intval($_GET['id']);
  $sql = "SELECT * FROM cargos WHERE CargoID = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  echo '<div id="cargos" class="tela">
    <form class="crud-form" action="./action/edit-cargos.php?id='.$id.'" method="post">
      <h2>Atualizar Cargo</h2>
      <input type="text" name="nome" placeholder="Nome do Cargo" value="'.$row['Nome'].'">
      <input type="number" name="TetoSal" placeholder="Teto Salarial" value="'.$row['TetoSalarial'].'">
      <button type="submit">Salvar</button>
    </form>
  </div>
';
}else{
  echo '<div id="cargos" class="tela">
    <form class="crud-form" action="./action/insert-cargos.php" method="post">
      <h2>Cadastro de Cargos</h2>
      <input type="text" name="nome" placeholder="Nome do Cargo">
      <input type="number" name="TetoSal" placeholder="Teto Salarial">
      <button type="submit">Salvar</button>
    </form>
  </div>
  ';
}
?>
  


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
