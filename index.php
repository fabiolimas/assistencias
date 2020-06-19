<?php
	/*session_start();
	if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
*/

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Imagem Foto</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="image/favicon.ico" />
	<script src="https://kit.fontawesome.com/cd1b9a04c6.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<!-- GetButton.io widget -->
<script type="text/javascript">
(function () {
var options = {
whatsapp: "+55(74)991381274", // WhatsApp number
call_to_action: "Fale conosco", // Call to action
position: "right", // Position may be 'right' or 'left'
message:"Olá Mundo",
logo:"image/logo.png",};
var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
})();
</script>
<!-- /GetButton.io widget --> 


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
			<li class="nav-item"><a  class="nav-link" href="index.php">Assistências Ótica</a></li>
			
		</ul>


	</header>
	<div class="container interface">
	
	
	<section class="container index">
	<div class="card border-secondary mb-3 text-center" style="max-width: 18rem;">
<div class="card-header">Nova Assistência</div>
<a href="nova_garantia.php">
  <div class="card-body text-secondary">

  <h5 class="card-title">Cadastrar Assistência </h5>
  <p class="card-text"><h1><i class="far fa-file"></i></h1></p>
</div></a>
</div>
<div class="card border-secondary mb-3 text-center" style="max-width: 18rem;">
<div class="card-header">Consultar Assistencias</div>
<a href="garantias.php">
  <div class="card-body text-secondary">

  <h5 class="card-title">Consultar</h5>
  <p class="card-text"><h1><i class="fas fa-search"></i></h1></p>
</div></a>
</div>
<!--<div class="card border-secondary mb-3 text-center" style="max-width: 18rem;">
<div class="card-header">Sair</div>
<a href="garantias.php">
  <div class="card-body text-secondary">

  <h5 class="card-title"></h5>
  <p class="card-text"><h1><i class="far fa-times-circle"></i></h1></p>
</div></a>
</div>
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
		</nav>-->
	</section>
	
</div>
</body>
</html>