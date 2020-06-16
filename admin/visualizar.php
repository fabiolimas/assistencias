<?php
	session_start();
	if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }


	include ("../buscas.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<title>Assistências</title>
</head>
<body>
	<div id="interface">
	<a href="javascript:history.back()"><i class="fas fa-long-arrow-alt-left"></i> Voltar</a><hr>
		<div class="ficha">
	
		<h1>Assistencia</h1>
<?php		
		$id=$_GET['id'];

$find="SELECT g.id, l.loja,g.cliente,g.cpf, g.id_mercadoria, g.marca, g.descricao, g.os, g.nota_fiscal, g.data_venda, g.data_garantia, g.avaria,sg.status, sg.id_status FROM garantias as g join lojas as l on g.id_loja=l.id_loja join status_garantia as sg on g.id_status_garantia=sg.id_status  where g.id='$id'";
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
<b>Nota fiscal / saida:</b> <?php echo $nota;?><br><br>
<b>Data da venda:</b> <?php echo date('d-m-Y', strtotime($data_venda));?><br>


</fieldset>
<fieldset class="visualizacao"><legend>Dados do Assistencia</legend>
<b>Data de abertura:</b> <?php echo date('d-m-Y', strtotime($data_chamado));?><br><br>
<b>Avaria da Peça:</b> <?php echo $avaria;?><br><br>
<b>Status:</b> <?php echo $status;?><br><br>



</fieldset>

			</div>
</div>
</body>
</html>