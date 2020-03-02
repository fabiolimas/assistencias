<?php
session_start();

?>
<!DOCTYPE html>

<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body id="bodyLogin">
	<div id="content">
		<div id="interface_login_adm">
			<h1 class="tituloLogin">Entrar Dashboard</h1>
		
			<form method="post" action="processa_login.php" id="formLoginAdmin">
				
			
				<input type="text" name="usuario" placeholder="Usuário"   autocomplete="off" required><br>

					
					<input type="password" name="senha" placeholder="Senha"  autocomplete="off" required><br>

				

					<button class="btnEntrar">Entrar</button>
					<p>Esqueceu a senha? <a href="esqueci_a_senha.php" id="linkLogin">Clique Aqui!</a></p>


			</form>



		</div>
	</div>
</body>
</html>