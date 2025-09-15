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
    $sql = "SELECT * FROM setor WHERE SetorID = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<div id="setores" class="tela">
        <form class="crud-form" method="post" action="./action/setores.php?id='.$id.'&acao=salvar">
          <h2>Atualização de Setor</h2>
          <input type="text" name="nome" placeholder="Nome do Setor" value="'.$row['Nome'].'">
          <input type="text" name="andar" placeholder="Andar" value="'.$row['Andar'].'">
          <input type="text" name="cor" placeholder="Cor" value="'.$row['Cor'].'">
          <button type="submit">Salvar</button>
        </form>
      </div>';
  }else{
    echo '<div id="setores" class="tela">
        <form class="crud-form" method="post" action="./action/setores.php?acao=salvar">
          <h2>Cadastro de Setores</h2>
          <input type="text" name="nome" placeholder="Nome do Setor">
          <input type="text" name="andar" placeholder="Andar">
          <input type="text" name="cor" placeholder="Cor">
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