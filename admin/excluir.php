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
			setTimeout("window.location='usuarios.php'",2000);
		}
	</script>
	<title>Assistência</title>
</head>
<body>
	<div id="interface">

	<h1>Exclusão de Usuário</h1>

	<?php


		$id=$_GET['id'];

		$remove="DELETE FROM usuarios where id='$id'";
		$query=mysqli_query($con, $remove);

		if($query){

			echo "Usuário Excluido com sucesso!";
			echo "<script>voltar()</script>";

		}else{

			echo "Erro: ".mysql_error($con);
		}







	?>

	
</div>
</body>
</html>