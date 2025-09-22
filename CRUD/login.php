<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Empresarial</title>
  <link rel="stylesheet" href="./assets/style.css">
  <style>
    
  </style>
</head>
<body>
  <header>
    <h1>Sistema de Gestão de Empresa</h1>
  </header>

  
  <main>

    <div id="login" class="tela active">
      <form class="login-form" action="./action/logar.php" method="post">
        <h2>Login</h2>
        <input type="text" id="usuario" name="user" placeholder="Usuário" required />
        <input type="password" id="senha" name="senha" placeholder="Senha" required />
        <button type="submit">Entrar</button>
      </form>
    </div>

   
  </main>

  <script src="./assets/script.js"></script>
</body>
</html>
