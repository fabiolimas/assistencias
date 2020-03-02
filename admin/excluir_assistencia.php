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

        <h2>Dashboard</h2>

    </header>
       
        <nav id="menu">
            <ul>
                <li title="Usuários Cadastrados">
                    <a href="usuarios.php"><br>Usuários <span class="fas fa-user-friends icons"></span></a>

                </li>
                <li title="Listar Lojas">
                    <a href="lojas.php"><br>Lojas <span class="fas fa-store icons"></span></a>
                </li>
                <li title="Assistencias">
                    <a href="assistencias.php"><br>Assistencias <span class="fas fa-tools icons"></span></a>
                </li>
                <li title="Sair">
                    <a href="logout.php"><br>Sair <span class="fas fa-times-circle icons"></span></a>
                </li>
            </ul>
        </nav>
        <section id="conteudo">	<a href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Voltar</a><hr>
	<h1>Exclusão de Assistência</h1>

	<?php


		$id=$_GET['id'];

		$remove="DELETE FROM garantias where id='$id'";
		$query=mysqli_query($con, $remove);

		if($query){

			echo "Assistencia excluida com sucesso!";
			echo "<script>voltar()</script>";

		}else{

			echo "Erro: ".mysql_error($con);
		}







	?></section>



        <footer id="rodape">Copyright - 2020</footer>
    
</div>
</body>
</html>

