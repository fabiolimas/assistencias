<?php
    session_start();
    if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }


    include_once("../conexao.php");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../fonts/css/all.css">
    <script type="text/javascript" src="../js/script.js"></script>
    	<script type="text/javascript">
		
		function voltar(){
			setTimeout("window.location='assistencias.php'",2000);
		}
	</script>
    
    <title>Dashboard</title>
</head>
<body>
    <div id="interface">

    <header id="cabecalho"> 

       <a href="index.php"><h2>Dashboard</h2></a>

    </header>
       <input type="checkbox" name="" checked id="btMenu">
        <nav id="menu">

          
          <label for="btMenu"><span class="fas fa-bars miniMenu"></span></label>
       
      
            <ul>
                <li title="Usuários Cadastrados">
                    <a href="usuarios.php"><br>Usuários <span class="fas fa-user-friends icons"></span></a>

                </li>
                <li title="Listar Lojas">
                    <a href="lojas.php"><br>Lojas <span class="fas fa-store icons"></span></a>
                </li>
                <li title="Assistencias">
                    <a href="assistencias.php"><br>Assistência <span class="fas fa-tools icons"></span></a>
                </li>
                <li title="Sair">
                    <a href="logout.php"><br>Sair <span class="fas fa-times-circle icons"></span></a>
                </li>
            </ul>
        </nav>
        <section id="conteudo">	<a href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Voltar</a><hr>
	<h1>Atualização Assistencias</h1>

	<?php

		$id=$_POST['id'];
		$loja=$_POST['loja'];
        $marca=$_POST['marca'];
		$mercadoria=$_POST['codigo_mercadoria'];
		$descricao=mb_strtoupper($_POST['descricao']);
		$os=$_POST['os'];
		$nota_fiscal=$_POST['nota_fiscal'];
		$data_venda=$_POST['data_venda'];
		$data_garantia=$_POST['data_garantia'];
		//$status_forn=$_POST['status_fornecedor'];
		$status_garantia=$_POST['status_garantia'];
        $avaria=mb_strtoupper($_POST['avaria']);
        $pendencia=mb_strtoupper($_POST['pendencia']);

		$merge="UPDATE `garantias` SET id_mercadoria='$mercadoria', marca='$marca', descricao='$descricao', os='$os', nota_fiscal='$nota_fiscal', data_venda='$data_venda', data_garantia='$data_garantia', id_status_garantia='$status_garantia', avaria='$avaria', pendencia='$pendencia' where id='$id'";
		$query_persist=mysqli_query($con, $merge);

		if($query_persist){
			echo "Garantia Atualizada";
			echo"<script>voltar()</script>";
		}else{

			echo "Erro: ".mysqli_error($con);
		}


	?></section>



        <footer id="rodape">Copyright - 2020</footer>
    
</div>
</body>
</html>


