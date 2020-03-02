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
      setTimeout("window.location='lojas.php'",2000);
    }
  </script>
  <title>Lojas</title>
</head>
<body>
  <div id="interface">
    <a href="lojas.php">Voltar</a>
  <h1>Nova Loja</h1>

  <?php

   $id=$_POST['id'];

                    $loja=mb_strtoupper($_POST['loja']);
                    $rasaosocial=mb_strtoupper($_POST['rsocial']);
                    $cnpj=$_POST['cnpj'];
                    $inscest=mb_strtoupper($_POST['inscest']);
                    $inscmun=mb_strtoupper($_POST['inscmun']);
                    $endereco=mb_strtoupper($_POST['endereco']);
                    $telefone=$_POST['fone'];
                    $numero=$_POST['numero'];
                    $cidade=mb_strtoupper($_POST['cidade']);
                    $bairro=mb_strtoupper($_POST['bairro']);
                    $uf=mb_strtoupper($_POST['uf']);
                    $status=$_POST['status'];


    $merge="UPDATE lojas set loja='$loja', rsocial='$rasaosocial', cnpj='$cnpj', inscest='$inscest', inscmun='$inscmun', endereco='$endereco', numero='$numero', bairro='$bairro', cidade='$cidade', uf='$uf', fone='$telefone', status='$status' where id_loja='$id'";
    $query=mysqli_query($con, $merge);

    if($query){
      echo "Loja alterada com sucesso!";
      echo "<script>voltar()</script>";
    }else{

      echo "Erro: ".mysqli_error($con);
    }


  ?>
</div>
</body>
</html>