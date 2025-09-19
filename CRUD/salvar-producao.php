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
    $sql2 = "SELECT funcionarios.Nome AS funcionario_nome,
              produtos.Nome AS produto_nome
              FROM producao
              JOIN funcionarios ON funcionarios.FuncionarioID = producao.FuncionarioID
              JOIN produtos ON produtos.ProdutoID = producao.ProdutoID
              WHERE ProducaoID = $id";
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result);
    $row3 = mysqli_fetch_assoc($result2);
    echo '<div id="producao" class="tela">
        <form class="crud-form" method="post" action="./action/producao.php?id='.$id.'&acao=salvar">
          <h2>Atualização de Produção de Produtos</h2>
          <select name="funcionario">
            <option value="'.$row2['FuncionarioID'].'">'.$row3['funcionario_nome'].'</option>';
            $sql = "SELECT * FROM funcionarios";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['FuncionarioID'].'">'.$row['Nome'].'</option>';
            }
          echo '</select>
          <select name="produto">
            <option value="'.$row2['ProdutoID'].'">'.$row3['produto_nome'].'</option>';
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
        <form class="crud-form" method="post" action="./action/producao.php?acao=salvar">
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