<?php
	session_start();
	if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }

	include ("conexao.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript">
		
		function voltar(){
			setTimeout("window.location='index.php'",2000);
		}
	</script>
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

		$persist="INSERT INTO `garantias`(`id`,  id_loja,`id_mercadoria`,`marca`, `descricao`, `os`, `nota_fiscal`, `data_venda`, `data_garantia`, `avaria`, `id_status_garantia`) VALUES (null,'$loja','$mercadoria','$marca', '$descricao','$os','$nota_fiscal','$data_venda','$data_garantia','$avaria','$status_garantia')";
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