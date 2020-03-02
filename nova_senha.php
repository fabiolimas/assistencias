<?php
session_start();
include("conexao.php");

?>
<!DOCTYPE html>

<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/estilo.css">
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

				$email=$_POST['email'];
				
				

				$find="SELECT * FROM usuarios where email='$email'";
				$query=mysqli_query($con, $find);

				$row=mysqli_num_rows($query);

				if ($row == 1){

					?>

				
			<center><form method="post" action="cria_nova_senha.php">
    
      <fieldset><legend>Confirme seu E-mail</legend>
    
     E-mail:
    <input type="mail" title="Confirme seu email" name="email"  title="Email" size="34" value='<?php echo $email;?>'readOnly><br><br>
    Nova Senha:
    <input type="password" name="senha" autocomplete="off" required>
         
    </fieldset>
    

    <input type="submit" name="" Value="Confirmar" id="btn">

  

  </form></center>	

<?php
	

	
}else{

	echo "<center><span class='recusado'>E-mail não encontrado!</span></center>";
	echo "<script>voltar()</script>";

}?>
		</div>
	</div>
</body>
</html>