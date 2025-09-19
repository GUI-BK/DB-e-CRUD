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
    $sql = "SELECT * FROM funcionarios WHERE FuncionarioID = $id";
    $sql2 = "SELECT cargos.Nome AS cargo_nome,
            setor.Nome AS setor_nome
            FROM funcionarios
            JOIN cargos ON cargos.CargoID = funcionarios.CargoID
            JOIN setor ON setor.SetorID = funcionarios.SetorID
            WHERE funcionarioID = $id";
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result);
    $row3 = mysqli_fetch_assoc($result2);
    echo '<div id="funcionarios" class="tela">
        <form class="crud-form" action="./action/funcionarios.php?id='.$id.'&acao=salvar" method="post">
          <h2>Atualização de Funcionário</h2>
          <input type="text" name="nome" placeholder="Nome" value="'.$row2['Nome'].'">
          <input type="date" name="datanasc" placeholder="Data de Nascimento" value="'.$row2['DataNascimento'].'">
          <input type="email" name="email" placeholder="Email" value="'.$row2['Email'].'">
          <input type="number" name="salario" placeholder="Salário" value="'.$row2['Salario'].'">
          <select name="sexo">
            <option value="'.$row2['Sexo'].'" id="sexo">Sexo</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
          </select>
          <input type="text" name="cpf" placeholder="CPF" value="'.$row2['CPF'].'">
          <input type="text" name="rg" placeholder="RG" value="'.$row2['RG'].'">
          <select name="cargo">
            <option value="'.$row2['CargoID'].'">'.$row3['cargo_nome'].'</option>';
            $sql = "SELECT * FROM cargos";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['CargoID'].'">'.$row['Nome'].'</option>';
            }
            echo '</select>
          <select name="setor">
            <option value="'.$row2['SetorID'].'">'.$row3['setor_nome'].'</option>';
            $sql = "SELECT * FROM setor";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['SetorID'].'">'.$row['Nome'].'</option>';
            }
          echo '</select>
          <button type="submit">Salvar</button>
        </form>
      </div>
      <script>
      let sexo = document.getElementById("sexo");
      if(sexo.value === "M"){
      sexo.innerHTML = "Masculino";
      }else{ 
      sexo.innerHTML = "Feminino";
      }
      </script>';
      
  }else{
    echo '<div id="funcionarios" class="tela">
        <form class="crud-form" action="./action/funcionarios.php?acao=salvar" method="post">
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
            <option value="">Cargo</option>';
            $sql = "SELECT * FROM cargos";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['CargoID'].'">'.$row['Nome'].'</option>';
            }
           echo '</select>
          <select name="setor">
            <option value="">Setor</option>';
            $sql = "SELECT * FROM setor";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
              echo '<option value="'.$row['SetorID'].'">'.$row['Nome'].'</option>';
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