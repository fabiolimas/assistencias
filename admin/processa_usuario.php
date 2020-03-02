<?php
	 session_start();
  if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }

	include("../conexao.php");
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
  <title>Usuarios</title>
</head>
<body>
  <div id="interface">
    <a href="index.php">Voltar</a>
  <h1>Novo Usuário</h1>

  <?php

    $nome=mb_strtoupper($_POST['nome']);
    $email=mb_strtolower($_POST['email']);
    $telefone=$_POST['fone'];
    $usuario=mb_strtolower($_POST['usuario']);
    $senha=md5($_POST['senha']);
    $permissao=$_POST['permissao'];


    $persist="INSERT INTO usuarios (id, nome, email, telefone, usuario,permissao, senha) VALUES(null,'$nome','$email','$telefone','$usuario','$permissao', '$senha')";
    $query=mysqli_query($con, $persist);

    if($query){
      echo "Usuário cadastrado com sucesso!";
      echo "<script>voltar()</script>";
    }else{

      echo "Erro: ".mysqli_error($con);
    }


  ?>
</div>
</body>
</html>