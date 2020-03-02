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
    <a href="index.php">Voltar</a>
  <h1>Nova Loja</h1>

  <?php

    $id=mb_strtoupper($_POST['id']);
    $loja=mb_strtoupper($_POST['loja']);
    $rsocial=mb_strtoupper($_POST['rsocial']);
    $cnpj=$_POST['cnpj'];
    $inscest=mb_strtoupper($_POST['inscest']);
    $inscmun=mb_strtoupper($_POST['inscmun']);
    $endereco=mb_strtoupper($_POST['endereco']);
    $numero=$_POST['numero'];
    $bairro=mb_strtoupper($_POST['bairro']);
    $cidade=mb_strtoupper($_POST['cidade']);
    $uf=mb_strtoupper($_POST['uf']);
    $fone=$_POST['fone'];
    $status=$_POST['status'];


    $persist="INSERT INTO lojas (id_loja, loja, rsocial, cnpj,inscest,inscmun,endereco, numero, bairro, cidade,uf,fone,status) VALUES($id,'$loja','$rsocial','$cnpj','$inscest','$inscmun','$endereco','$numero','$bairro','$cidade','$uf','$fone','$status')";
    $query=mysqli_query($con, $persist);

    if($query){
      echo "Loja cadastrada com sucesso!";
      echo "<script>voltar()</script>";
    }else{

      echo "Erro: ".mysqli_error($con);
    }


  ?>
</div>
</body>
</html>