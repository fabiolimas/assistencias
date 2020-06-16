<?php
	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="image/favicon.ico" />
	<script src="https://kit.fontawesome.com/cd1b9a04c6.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<title>Assistências</title>
</head>
<body class="fluid-container">

	<header class="col-12 cabecalho">
		<div class="col-3 logo"><a href="../index.php"><img src="image/logo.png"></a></div>	
		
		<input type="checkbox" id="check">
		<label for="check" class="menuresp"><span class="fas fa-bars barras"></span></label>
		<ul class="nav">
			<li class="nav-item"><a class="nav-link" href='../login.php'>Envio de Arquivos</a></li>
			<li class="nav-item"><a class="nav-link" href="../opcoes.php">Encadernadora</a></li>
			<li class="nav-item"><a  class="nav-link" href="#">Molduraria</a></li>
			<li class="nav-item"><a  class="nav-link" href="https://www.fotoimagem.com.br" target="_blank">Site Foto Imagem </a></li>
			<li class="nav-item"><a  class="nav-link" href="assistencia.php">Assistências Ótica</a></li>
			
		</ul>


	</header>
	<div class="container interface">

	
		<a href="index.php">Voltar</a>
	<h1>Assistências</h1>

	<div class="col-3 busca">
	<form method="post" action="#">
	
	
		Buscar: 
		<input type="text" class="form-control" name="buscar" placeholder="Número da OS" title="Buscar pelo número da OS" id="buscar" 
		 required>
		

	</form>
</div>
	<div id="resultado">
	<?php
		include("lista_garantias.php");
	?>
</div>
	
</div>
</body>
</html>