<?php
	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<title>Assistências</title>
</head>
<body>
	<div id="interface">
		<a href="index.php">Voltar</a>
	<h1>Assistências</h1>

	<form method="post" action="#">
	
		<fieldset><legend>Assistências</legend>
		Buscar: 
		<input type="text" name="buscar" placeholder="Número da OS" title="Buscar pelo número da OS" id="buscar" 
		 required>
		

	</form>
	<div id="resultado">
	<?php
		include("lista_garantias.php");
	?>
</div>
	
</div>
</body>
</html>