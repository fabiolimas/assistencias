<?php
	

	include("conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <title>Usuarios</title>
</head>
<body>
  <div id="interface">
    <a href="index.php">Voltar</a>
  <h1>Novo Usuário</h1>

  <form method="post" action="processa_usuario.php">
    
      <fieldset><legend>Novo Usuário</legend>
    Nome:
    <input type="text" name="nome" placeholder="Nome" title="Nome e Sobrenome" size="34" required><br><br>
    E-mail:
    <input type="email" name="email"  title="Email" size="34" required><br><br>
    Telefone:
    <input type="text" name="fone" placeholder="(XX)XXXX-XXXX" title="Telefone" size="31" required><br><br>
    </fieldset>
    
    <fieldset><legend>Login</legend>
    Usuário:
    <input type="text" title="Usuario que fará login" name="usuario" size="32" required><br><br>
    Senha:
    <input type="password" name="senha" title="senha" size="10" required>
    </fieldset>

    <input type="submit" name="" Value="Cadastrar" id="btn">

  

  </form>
</div>
</body>
</html>