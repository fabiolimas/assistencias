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
			<li class="nav-item"><a  class="nav-link" href="assistencia.php">Assistências Ótica</a></li>
			
		</ul>


	</header>
	<div class="container interface">
		<section class="col-lg-8 col-sd-12 container">
		<a href="index.php">Voltar</a>
	<h1>Nova Assistência</h1>
	<hr>
	<div class="col-lg-6 col-sd-12">
	<form method="post" action="processa_garantia.php">

	
		
		Loja: <select class="form-control" name ="lojas" value="" required>
			
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
		<fieldset><legend>Dados do Cliente</legend>
		Nome
		<input type="text" name="cliente" class="form-control" placeholder="Nome Completo" title="Nome Completo" size="40" required>
		CPF:
		<input type="text" name="cpf"  class="form-control" title="Informe o CPF" size="15" maxlength="11" required>
		<br>
		</fieldset><br>
			
		<fieldset><legend>Dados da Venda</legend>
		Código da Peça: 
		<input type="text" name="codigo_mercadoria" class="form-control" placeholder="Código interno" title="Código do Goldbiz" size="10" required>
		Grife:
		<input type="text" name="marca"  class="form-control" title="Marca da Peça" size="10" required>
		Referencia:
		<input type="text" class="form-control" title=" Descrição com referencia da peça" name="descricao" size="40" required>
		OS:
		<input type="text" class="form-control" name="os" title="OS da venda" size="10" required>
		Nota Fiscal Nº:
		<input type="text" class="form-control" name="nota_fiscal" title="Número da nota fiscal" size="10" required><br>
		
		Data da Venda:
		<input type="date" class="form-control" name="data_venda" title="Data da venda" size="15" required><br>
		</fieldset><br>
		<fieldset><legend>Abertura de Assistência</legend>
		Data Pedido de Garantia:
		<input type="date" class="form-control" name="data_garantia" title="Data da abertura da garantia" size="15" required>
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
		<select class="form-control" name="status_garantia" value="" id='stat_garantia'  required>

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

		Avaria:<br><textarea title="Até 200 caracteres" class="form-control" name="avaria" required maxlength="200" id="avaria"></textarea><br>
		
		</fieldset>

		
	
		<button type="submit" class="btn btn-primary"  id='bt1' name="up" >Cadastrar</button>

	

	</form>
	</div>
		</section>
</div>

</body>
</html>