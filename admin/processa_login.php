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
			<h1 class="tituloLogin">Entrar</h1>
			<?php

				$usuario=$_POST['usuario'];
				$senha=md5($_POST['senha']);

				

				$find="SELECT * FROM usuarios where usuario='$usuario' and senha='$senha' and status='1' and permissao=1";
				$query=mysqli_query($con, $find);

				$row=mysqli_num_rows($query);


				

				if($row == 1){

					$_SESSION['usuario']='$usuario';
					$_SESSION['senha']='$senha';
					header('location:index.php');

				}else{

					echo "<center><span class='recusado'>Acesso Negado!<br>
						Usuário ou senha incorretos!</span></center>";
					echo "<script>voltar()</script>";
					unset ($_SESSION['usuario']);
					unset ($_SESSION['senha']);

					}

						
					
					

				
			



			?>


		</div>
	</div>
</body>
</html>