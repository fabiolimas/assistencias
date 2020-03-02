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
    $id=$_POST['id'];
    $nome=mb_strtoupper($_POST['nome']);
    
    $telefone=$_POST['fone'];
    $usuario=mb_strtolower($_POST['usuario']);
    $status=$_POST['status'];
    $permissao=$_POST['permissao'];


    $merge="UPDATE usuarios set nome='$nome', telefone='$telefone', status='$status', permissao= '$permissao' where id='$id'";
    $query=mysqli_query($con, $merge);

    if($query){
      echo "Usuário alterado com sucesso!";
      echo "<script>voltar()</script>";
    }else{

      echo "Erro: ".mysqli_error($con);
    }


  ?>
</div>
</body>
</html>