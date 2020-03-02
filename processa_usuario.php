<?php


	include("conexao.php");
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


    $find_user="SELECT * FROM usuarios where email='$email'";
    $query_user=mysqli_query($con, $find_user);

    $verifica=mysqli_num_rows($query_user);

    if($verifica >0){

      echo " Usuário ja possui cadastro no sistema!<br>";
      echo "<script>voltar()</script>";
      exit();

    }else{


    $persist="INSERT INTO usuarios (id, nome, email, telefone, usuario, senha) VALUES(null,'$nome','$email','$telefone','$usuario', '$senha')";
    $query=mysqli_query($con, $persist);

    if($query){
      echo "Usuário cadastrado com sucesso!";
      echo "<script>voltar()</script>";
    }else{

      echo "Erro: ".mysqli_error($con);
    }
}

  ?>
</div>
</body>
</html>