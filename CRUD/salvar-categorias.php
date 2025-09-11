<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div id="categorias" class="tela">
        <form class="crud-form" method="post" action="./action/insert-categorias.php">
          <h2>Cadastro de Categorias</h2>
          <input type="text" name="nome" placeholder="Nome da Categoria">
          <textarea name="desc" placeholder="Descrição"></textarea>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
