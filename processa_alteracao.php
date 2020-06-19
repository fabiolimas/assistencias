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
<body>
	<div id="interface">

	<h1>Atualização Assistência</h1>

	<?php

		$id=$_POST['id'];
		$loja=$_POST['loja'];
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
		$arquivo=$_FILES['arquivo'];

		$merge="UPDATE `garantias` SET id_mercadoria='$mercadoria', marca='$marca', descricao='$descricao', os='$os', nota_fiscal='$nota_fiscal', data_venda='$data_venda', data_garantia='$data_garantia', id_status_garantia='$status_garantia', avaria='$avaria' where id='$id'";
		$query_persist=mysqli_query($con, $merge);


		$pedido=mysqli_insert_id($con);
		
		
		$destino="upload/$id/";

		$itensEnviados=count($arquivo['tmp_name']);

    if(!file_exists($destino)){
    $salvar=mkdir($destino);
    $salvar2=mkdir($destino);
    
   }else{
       echo "pasta ja existe";
   }
    
    for($i=0;$i<$itensEnviados;$i++){

        $persist_img="INSERT INTO imagens (`id`, `nome`, `id_garantia`) VALUES(NULL,'".$arquivo['name'][$i]."','$id')";
        $query_img=mysqli_query($con, $persist_img);          
		
		
           
            if(move_uploaded_file($arquivo['tmp_name'][$i],$destino."/".$arquivo['name'][$i])){
				echo"<script>voltar()</script>";
                
               
            }else{
                echo "falha no envio";
            }
		}
		if($query_persist){
			echo "Garantia Atualizada";
			echo"<script>voltar()</script>";
		}else{

			echo "Erro: ".mysqli_error($con);

		}


	?>

	
</div>
</body>
</html>