<?php
	session_start();
	if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }

	include ("../conexao.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script type="text/javascript">
		
		function voltar(){
			setTimeout("window.location='lojas.php'",2000);
		}
	</script>
	<title>Lojas</title>
</head>
<body>
	<div id="interface">

	<h1>Exclusão de Loja</h1>

	<?php


		$id=$_GET['id'];

		$remove="DELETE FROM lojas where id_loja='$id'";
		$query=mysqli_query($con, $remove);

		if($query){

			echo "Loja Excluida com sucesso!";
			echo "<script>voltar()</script>";

		}else{

			echo "Erro: ".mysqli_error($con);
		}







	?>

	
</div>
</body>
</html>