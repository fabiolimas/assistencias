<?php
	session_start();
	if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }


	include ("buscas.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Assistências</title>
</head>
<body>
	<div id="interface">
	
		<h1>Controle de Assistências Técnicas</h1>
		<nav id="menu">
			<ul>
				<li title="Entrar nova assistência">
					<a href="nova_garantia.php"><img src="images/novo.png"><br>Nova Assistência</a>

				</li>
				<li title="Listar assistencias">
					<a href="garantias.php"><img src="images/busca.png"><br>Consultar Assistências</a>
				</li>
				<li title="Sair">
					<a href="logout.php"><img src="images/sair.png"><br>Sair</a>
				</li>
			</ul>
		</nav>
	
</div>
</body>
</html>