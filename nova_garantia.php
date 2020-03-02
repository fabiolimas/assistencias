<?php
	session_start();
	if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }


	include ("buscas.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Assistências</title>
</head>
<body>
	<div id="interface">
		<a href="index.php">Voltar</a>
	<h1>Nova Assistência</h1>

	<form method="post" action="processa_garantia.php">
		
		Loja: <select name ="lojas" value="" required>
			
			<option value="">Selecione uma Loja</option>
			<?php

				if($row >0){

					foreach ($query as $lojas) {

						$loja=$lojas['loja'];
						$id_loja=$lojas['id_loja'];

				echo "<option value='$id_loja'>$loja</option>";


							}
				}


			?>


		</select><br>
		<fieldset><legend>Dados da Venda</legend>
		Código da Peça: 
		<input type="text" name="codigo_mercadoria" placeholder="Código interno" title="Código do Goldbiz" size="10" required>
		Marca:
		<input type="text" name="marca"  title="Marca da Peça" size="10" required>
		Descrição:
		<input type="text" title=" Descrição com referencia da peça" name="descricao" size="40" required>
		OS:
		<input type="text" name="os" title="OS da venda" size="10" required>
		Nota Fiscal Nº:
		<input type="text" name="nota_fiscal" title="Número da nota fiscal" size="10" required><br>
		
		Data da Venda:
		<input type="date" name="data_venda" title="Data da venda" size="15" required><br>
		</fieldset><br>
		<fieldset><legend>Abertura de Assistência</legend>
		Data Pedido de Garantia:
		<input type="date" name="data_garantia" title="Data da abertura da garantia" size="15" required>
		<!--Status Fornecedor:
		<select name="status_fornecedor" value="" required>

			<option value="">Status</option>
			<?php

				if($row_forn >0){

					foreach ($query_forn as $status_forn) {

						$status_fornecedor=$status_forn['status_fornecedor'];
						$id_status_fornecedor=$status_forn['id_status_fornecedor'];

				echo "<option value='$id_status_fornecedor'>$status_fornecedor</option>";


							}
				}


			?>


		</select>-->
		Status Assistência:
		<select name="status_garantia" value="" required>

			<option value="">Status Assistência</option>
			<?php

				if($row_status >0){

					foreach ($query_status as $status_gan) {

						$status_garantia=$status_gan['status'];
						$id_status_garantia=$status_gan['id_status'];

				echo "<option value='$id_status_garantia'>$status_garantia</option>";


							}
				}


			?>


		</select><br>

		Avaria:<br><textarea title="Até 200 caracteres" name="avaria" required maxlength="200"></textarea><br>
		</fieldset>

		<input type="submit" name="" Value="Cadastrar" id="btn">

	

	</form>
</div>
</body>
</html>