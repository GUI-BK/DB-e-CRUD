<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div id="producao" class="tela">
        <form class="crud-form" method="post" action="./action/insert-producao.php">
          <h2>Cadastro de Produção de Produtos</h2>
          <select name="funcionario">
            <option value="">Funcionário</option>
            <?php
            $sql = "SELECT * FROM funcionarios";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['FuncionarioID'].'">'.$row['Nome'].'</option>';
            }
            ?>
          </select>
          <select name="produto">
            <option value="">Produto</option>
            <?php
            $sql = "SELECT * FROM produtos";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['ProdutoID'].'">'.$row['Nome'].'</option>';
            }
            ?>
          </select>
          <label for="dataprod">Data da Produção</label>
          <input type="date" name="dataprod" placeholder="Data de Produção">
          <label for="dataent">Data da entrega</label>
          <input type="date" name="dataent" placeholder="Data da Entrega">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>