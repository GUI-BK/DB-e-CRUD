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
    $sql = "SELECT * FROM produtos WHERE ProdutoID = $id";
    $sql2 = "SELECT categorias.Nome AS categoria_nome
              FROM produtos
              JOIN categorias ON categorias.CategoriaID = produtos.CategoriaID
              WHERE produtos.ProdutoID = $id";
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result);
    $row3 = mysqli_fetch_assoc($result2);
    echo '<div id="produtos" class="tela">
        <form class="crud-form" action="./action/produtos.php?id='.$id.'&acao=salvar" method="post">
          <h2>Atualização de Produto</h2>
          <input type="text" name="nome" placeholder="Nome do Produto" value="'.$row2['Nome'].'">
          <input type="number" name="preco" placeholder="Preço" value="'.$row2['Preco'].'">
          <input type="number" name="peso" placeholder="Peso (g)" value="'.$row2['Peso'].'">
          <textarea name="desc" placeholder="Descrição">'.$row2['Descricao'].'</textarea>
          <select name="categoria">
            <option value="'.$row2['CategoriaID'].'">'.$row3['categoria_nome'].'</option>';
            $sql = "SELECT * FROM categorias";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['CategoriaID'].'">'.$row['Nome'].'</option>';
            }
           echo '</select>
          <button type="submit">Salvar</button>
        </form>
      </div>';
  }else{
    echo '<div id="produtos" class="tela">
        <form class="crud-form" action="./action/produtos.php?acao=salvar" method="post">
          <h2>Cadastro de Produtos</h2>
          <input type="text" name="nome" placeholder="Nome do Produto">
          <input type="number" name="preco" placeholder="Preço">
          <input type="number" name="peso" placeholder="Peso (g)">
          <textarea name="desc" placeholder="Descrição"></textarea>
          <select name="categoria">
            <option value="">Categoria</option>';
            $sql = "SELECT * FROM categorias";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['CategoriaID'].'">'.$row['Nome'].'</option>';
            }
           echo '</select>
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