<?php
	/*session_start();
	if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }

*/
	include ("buscas.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Imagem Foto</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="image/favicon.ico" />
	<script src="https://kit.fontawesome.com/cd1b9a04c6.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<!-- GetButton.io widget -->
<script type="text/javascript">
(function () {
var options = {
whatsapp: "+55(74)991381274", // WhatsApp number
call_to_action: "Fale conosco", // Call to action
position: "right", // Position may be 'right' or 'left'
message:"Olá Mundo",
logo:"image/logo.png",};
var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
})();
</script>
<!-- /GetButton.io widget --> 


</head>
<body class="fluid-container">

	<header class="col-12 cabecalho">
		<div class="col-3 logo"><a href="../index.php"><img src="image/logo.png"></a></div>	
		
		<input type="checkbox" id="check">
		<label for="check" class="menuresp"><span class="fas fa-bars barras"></span></label>
		<ul class="nav">
			<li class="nav-item"><a class="nav-link" href='../login.php'>Envio de Arquivos</a></li>
			<li class="nav-item"><a class="nav-link" href="../opcoes.php">Encadernadora</a></li>
			<li class="nav-item"><a  class="nav-link" href="#">Molduraria</a></li>
			<li class="nav-item"><a  class="nav-link" href="https://www.fotoimagem.com.br" target="_blank">Site Foto Imagem </a></li>
			<li class="nav-item"><a  class="nav-link" href="index.php">Assistencias Ótica</a></li>
			
		</ul>


	</header>
	<div class="container interface">
		<section class="col-lg-7 col-sd-12 container">
	<a href="javascript:history.back()"><i class="fas fa-long-arrow-alt-left"></i> Voltar</a><hr>
		<div class="ficha">
	
		<h1>Assistencia</h1>
<?php		
		$id=$_GET['id'];

$find="SELECT g.id, l.loja,g.cliente,g.cpf, g.id_mercadoria, g.marca, g.descricao, g.os, g.nota_fiscal, g.data_venda, g.data_garantia, g.avaria,sg.status, sg.id_status, g.pendencia FROM garantias as g join lojas as l on g.id_loja=l.id_loja join status_garantia as sg on g.id_status_garantia=sg.id_status  where g.id='$id'";
		  $query=mysqli_query($con, $find);
		  $rows=mysqli_num_rows($query);

		  if($rows >0){


			  foreach ($query as  $garantias) {

				  $id=$garantias['id'];
				  $loja=$garantias['loja'];
				  $marca=$garantias['marca'];
				  $mercadoria=$garantias['id_mercadoria'];
				  $descricao=$garantias['descricao'];
				  $os=$garantias['os'];
				  $nota=$garantias['nota_fiscal'];
				  $data_venda=$garantias['data_venda'];
				  $data_chamado=$garantias['data_garantia'];
				  $avaria=$garantias['avaria'];
				  $status=$garantias['status'];
				  $id_status=$garantias['id_status'];
				  $cliente=$garantias['cliente'];
				  $cpf=$garantias['cpf'];
				  $pendencia=isset($garantias['pendencia'])?$garantias['pendencia']:" ";
				}}else{
				  echo "Erro: ".mysqli_error($con);
				}


	

?>

Loja: <?php echo $loja;?>

<fieldset class="visualizacao"><legend>Dados do Cliente</legend>
<b>Nome:</b> <?php echo $cliente;?><br><br>
<b>CPF:</b> <?php echo $cpf;?><br>


</fieldset>
<fieldset class="visualizacao"><legend>Dados da Venda</legend>
<b>Código da Mercadoria:</b> <?php echo $mercadoria;?><br><br>
<b>Grife:</b> <?php echo $marca;?><br><br>
<b>Referencia:</b> <?php echo $descricao;?><br><br>
<b>OS:</b> <?php echo $os;?><br><br>
<b>Nota fiscal / saida:</b> <?php echo $nota;?><br><br>
<b>Data da venda:</b> <?php echo date('d-m-Y', strtotime($data_venda));?><br>


</fieldset>
<fieldset class="visualizacao"><legend>Dados do Assistencia</legend>
<b>Data de abertura:</b> <?php echo date('d-m-Y', strtotime($data_chamado));?><br><br>
<b>Imagens anexadas:</b><?php
	$find="SELECT * FROM  imagens where id_garantia= $id";
	$query_imagens=mysqli_query($con, $find);

 $result=mysqli_num_rows($query_imagens);

 if ($result >0){
	 foreach ($query_imagens as $dados) {
		 
		$caminho=$dados['nome'];

		echo "<span class='mini'><a href='upload/$id/$caminho' download><img src='upload/$id/$caminho' style='width:100px;' title='Baixar Imagem'></a></span>";
		
	 }
 }else{
	echo " Sem imagens<br><br>";
}
?>
<br><b>Pendencia:</b> <?php  echo "<span style='color:red;'> $pendencia</span>";?><br><br>
<br><b>Avaria da Peça:</b> <?php echo $avaria;?><br><br>
<b>Status:</b> <?php echo $status;?><br><br>



</fieldset>
		</div>

			</div>
</div>
</body>
</html>