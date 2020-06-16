<?php
	

	include ("conexao.php");
	
?>



 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript">
		
		function voltar(){
			setTimeout("window.location='login.php'",2000);
		}
	</script>
	<title>Usuários</title>
</head>
<body>
	<div id="interface">

	<a href="login.php">Voltar</a>
	<h1>Esqueceu a senha?</h1>

	<form method="post" action="nova_senha.php">
    
      <fieldset><legend>Confirme seu E-mail</legend>
    
     E-mail:
    <input type="email" title="Digite aqui o email que foi cadastrado em sua conta" name="email"  title="Email" size="34" placeholder="Email vinculado a conta" required autocomplete="off"><br><br>
         
    </fieldset>
    

    <input type="submit" name="" Value="Confirmar" id="btn">

  

  </form>
</div>
</body>
</html>