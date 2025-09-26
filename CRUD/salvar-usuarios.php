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
  $sql = "SELECT * FROM usuarios WHERE UsuarioID = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  echo '<div id="usuarios" class="tela">
        <form class="crud-form" method="post" action="./action/usuarios.php?id='.$id.'&acao=salvar">
          <h2>Atualização de Usuário</h2>
          <input type="text" name="nome" placeholder="Nome do Usuário" value="'.$row['Nome'].'">
          <input type="text" name="user" placeholder="Nome de Usuário" value="'.$row['Usuario'].'">
          <input type="email" name="email" placeholder="Email do Usuário" value="'.$row['Email'].'">
          <input type="password" name="senha" placeholder="Senha do Usuário" value="">
          <button type="submit">Salvar</button>
        </form>
      </div>

';
}else{
    echo '<div id="usuarios" class="tela">
    <form class="crud-form" method="post" action="./action/usuarios.php?acao=salvar">
      <h2>Cadastro de Usuários</h2>
      <input type="text" name="nome" placeholder="Nome do Usuário">
      <input type="text" name="user" placeholder="Nome de Usuário">
      <input type="email" name="email" placeholder="Email do Usuário">
      <input type="password" name="senha" placeholder="Senha do Usuário">
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
