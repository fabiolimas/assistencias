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
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../fonts/css/all.css">
    <script type="text/javascript">$(function(){
    //Pesquisar os cursos sem refresh na página
    $("#buscar").keyup(function(){
        
        var pesquisa = $(this).val();
        
        //Verificar se há algo digitado
        if(pesquisa != null){
            var dados = {
                assistencias : pesquisa
            }       
            $.post('lista_assistencias.php', dados, function(retorna){
                //Mostra dentro da ul os resultado obtidos 
                $("#resultado").html(retorna);
            });
        }else{
            $("#resultado").html(os);
        }       
    });
});</script>
    
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
                <li title="Assistencias" style="background:#07dea6;">
                    <a href="assistencias.php"><br>Assistencias <span class="fas fa-tools icons"></span></a>
                </li>
                <li title="Sair">
                    <a href="logout.php"><br>Sair <span class="fas fa-times-circle icons"></span></a>
                </li>
            </ul>
        </nav>
        <section id="conteudo">	<a href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Voltar</a><hr>
	<h1>Assistência</h1>

	<form method="post" action="#">
	
		<fieldset><legend>Assistências</legend>
		Buscar: 
		<input type="text" name="buscar" placeholder="Cliente / OS" title="Cliente / OS" id="buscar">
		

	</form><br><br>
	<!--<button id='btnAdm'><a href='novo_usuario.php' target="_blank" >Novo Usuário</a></button>-->
	<div id="resultado">
	<?php
		include("lista_assistencias.php");
	?></section>



        <footer id="rodape">Copyright - 2020</footer>
    
</div>
</body>
</html>

