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
  $sql = "SELECT * FROM categorias WHERE CategoriaID = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  echo '<div id="categorias" class="tela">
        <form class="crud-form" method="post" action="./action/categorias.php?id='.$id.'&acao=salvar">
          <h2>Atualização de Categoria</h2>
          <input type="text" name="nome" placeholder="Nome da Categoria" value="'.$row['Nome'].'">
          <textarea name="desc" placeholder="Descrição">'.$row['Descricao'].'</textarea>
          <button type="submit">Salvar</button>
        </form>
      </div>

';
}else{
  echo '<div id="categorias" class="tela">
        <form class="crud-form" method="post" action="./action/categorias.php?acao=salvar">
          <h2>Cadastro de Categorias</h2>
          <input type="text" name="nome" placeholder="Nome da Categoria">
          <textarea name="desc" placeholder="Descrição"></textarea>
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
