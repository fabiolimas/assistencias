<?php
session_start();
include("../conexao.php");

?>
<!DOCTYPE html>

<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="../css/estilo.css">
	<script type="text/javascript">
		function voltar(){

			setTimeout("window.location='login.php'",2000);
		}

	</script>
</head>
<body id="bodyLogin">
	<div id="content">
		<div id="interface_login">
			<h1>Esqueceu a senha?</h1><br><br>
			<?php
	$emailconfirm=$_POST['email'];
	$senha=md5($_POST['senha']);

	$merge="UPDATE usuarios set senha='$senha' where email='$emailconfirm' ";
	$query=mysqli_query($con, $merge);

	echo "Nova senha cadastrada com sucesso";
	echo "<script>voltar()</script>";
	exit();


?>
		</div>
	</div>
</body>
</html>