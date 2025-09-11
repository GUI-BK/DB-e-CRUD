<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  
  <main>

    <div id="produtos" class="tela">
        <form class="crud-form" action="" method="post">
          <h2>Cadastro de Produtos</h2>
          <input type="text" placeholder="Nome do Produto">
          <input type="number" placeholder="Preço">
          <input type="number" placeholder="Peso (g)">
          <textarea placeholder="Descrição"></textarea>
          <select>
            <option value="">Categoria</option>
            <?php
            $sql = "SELECT * FROM categorias";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['CategoriaID'].'">'.$row['Nome'].'</option>';
            }
            ?>
          </select>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>