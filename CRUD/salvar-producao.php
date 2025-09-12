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
    $sql = "SELECT * FROM producao WHERE ProducaoID = $id";
    $result = mysqli_query($conn, $sql);
    $row2 = mysqli_fetch_assoc($result);
    echo '<div id="producao" class="tela">
        <form class="crud-form" method="post" action="./action/edit-producao.php?id='.$id.'">
          <h2>Atualização de Produção de Produtos</h2>
          <select name="funcionario">
            <option value="'.$row2['FuncionarioID'].'">Funcionário</option>';
            $sql = "SELECT * FROM funcionarios";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['FuncionarioID'].'">'.$row['Nome'].'</option>';
            }
          echo '</select>
          <select name="produto">
            <option value="'.$row2['ProdutoID'].'">Produto</option>';
            $sql = "SELECT * FROM produtos";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['ProdutoID'].'">'.$row['Nome'].'</option>';
            }
          echo '</select>
          <label for="dataprod">Data da Produção</label>
          <input type="date" name="dataprod" placeholder="Data de Produção" value="'.$row2['DataProducao'].'">
          <label for="dataent">Data da entrega</label>
          <input type="date" name="dataent" placeholder="Data da Entrega" value="'.$row2['DataEntrega'].'">
          <button type="submit">Salvar</button>
        </form>
      </div>';
  }else{
    echo '<div id="producao" class="tela">
        <form class="crud-form" method="post" action="./action/insert-producao.php">
          <h2>Cadastro de Produção de Produtos</h2>
          <select name="funcionario">
            <option value="">Funcionário</option>';
            $sql = "SELECT * FROM funcionarios";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['FuncionarioID'].'">'.$row['Nome'].'</option>';
            }
         echo '</select>
          <select name="produto">
            <option value="">Produto</option>';
            $sql = "SELECT * FROM produtos";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['ProdutoID'].'">'.$row['Nome'].'</option>';
            }
          echo '</select>
          <label for="dataprod">Data da Produção</label>
          <input type="date" name="dataprod" placeholder="Data de Produção">
          <label for="dataent">Data da entrega</label>
          <input type="date" name="dataent" placeholder="Data da Entrega">
          <button type="submit">Salvar</button>
        </form>
      </div>';
  }
  ?>
   
  </main>
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>