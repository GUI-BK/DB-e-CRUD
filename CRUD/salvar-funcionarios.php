<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

  
  <main>

    <div id="funcionarios" class="tela">
        <form class="crud-form" action="./action/insert-funcionarios.php" method="post">
          <h2>Cadastro de Funcionários</h2>
          <input type="text" name="nome" placeholder="Nome">
          <input type="date" name="datanasc" placeholder="Data de Nascimento">
          <input type="email" name="email" placeholder="Email">
          <input type="number" name="salario" placeholder="Salário">
          <select name="sexo">
            <option value="">Sexo</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
          </select>
          <input type="text" name="cpf" placeholder="CPF">
          <input type="text" name="rg" placeholder="RG">
          <select name="cargo">
            <option value="">Cargo</option>
            <?php
            $sql = "SELECT * FROM cargos";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['CargoID'].'">'.$row['Nome'].'</option>';
            }
            ?>
          </select>
          <select name="setor">
            <option value="">Setor</option>
            <?php
            $sql = "SELECT * FROM setor";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['SetorID'].'">'.$row['Nome'].'</option>';
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
