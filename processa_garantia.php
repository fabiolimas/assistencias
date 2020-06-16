<?php
	/*session_start();
	if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
*/
	include ("conexao.php");

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
			<li class="nav-item"><a  class="nav-link" href="assistencia.php">Assistências Ótica</a></li>
			
		</ul>
		<div class="container interface">
	<script type="text/javascript">
		
		function voltar(){
			setTimeout("window.location='index.php'",2000);
		}
	</script>

	</header>
	
	<title>Assistência</title>
</head>
<body>
	<div id="interface">

	<h1>Assistência</h1>

	<?php


		$loja=$_POST['lojas'];
		$mercadoria=$_POST['codigo_mercadoria'];
		$marca=mb_strtoupper($_POST['marca']);
		$descricao=mb_strtoupper($_POST['descricao']);
		$os=$_POST['os'];
		$nota_fiscal=$_POST['nota_fiscal'];
		$data_venda=$_POST['data_venda'];
		$data_garantia=$_POST['data_garantia'];
		//$status_forn=$_POST['status_fornecedor'];
		$status_garantia=$_POST['status_garantia'];
		$avaria=mb_strtoupper($_POST['avaria']);
		$cliente=mb_strtoupper($_POST['cliente']);
		$cpf=$_POST['cpf'];
		

		$persist="INSERT INTO `garantias`(`id`,  id_loja,`cliente`,`cpf`,`id_mercadoria`,`marca`, `descricao`, `os`, `nota_fiscal`, `data_venda`, `data_garantia`, `avaria`,  `id_status_garantia`) VALUES (null,'$loja','$cliente','$cpf','$mercadoria','$marca', '$descricao','$os','$nota_fiscal','$data_venda','$data_garantia','$avaria','$status_garantia')";
		$query_persist=mysqli_query($con, $persist);

		if($query_persist){
			echo "Assistencia cadastrada";
			echo"<script>voltar()</script>";
		}else{

			echo "Erro: ".mysqli_error($con);
		}







	?>

	
</div>
</body>
</html>