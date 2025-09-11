<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  
  <main>

    <div id="setores" class="tela">
        <form class="crud-form" method="post" action="./action/insert-setores.php">
          <h2>Cadastro de Setores</h2>
          <input type="text" name="nome" placeholder="Nome do Setor">
          <input type="text" name="andar" placeholder="Andar">
          <input type="text" name="cor" placeholder="Cor">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>