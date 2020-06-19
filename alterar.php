<?php
 /* session_start();
  if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
*/
  include("conexao.php");

  include ("buscas.php");

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
                    $pendencia=$garantias['pendencia'];
                  }}else{
                    echo "Erro: ".mysqli_error($con);
                  }

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
			<li class="nav-item"><a  class="nav-link" href="assistencia">Assistências Ótica</a></li>
			
		</ul>

    
	</header>
	<div class="container interface">
		<section class="col-lg-8 col-sd-12 container">
    <a href="index.php">Voltar</a>
  <h1>Alterar Assistencia</h1>
  <hr>
  <div class="col-lg-6 col-sd-12">

  <form method="post" action="processa_alteracao.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <fieldset><legend>Dados do Cliente</legend>
		Nome
		<input type="text" class="form-control" name="cliente" placeholder="Nome Completo" title="Nome Completo" size="40" value="<?php echo $cliente;?>" >
		CPF:
		<input type="text" class="form-control" name="cpf"  title="Informe o CPF" size="15" maxlength="11" value="<?php echo $cpf;?>">
		<br>
		</fieldset><br>
    
    Loja: <input type="text" class="form-control" name="loja" value="<?php echo $loja;?>" readOnly>
    <fieldset><legend>Dados da Venda</legend>
    Código da Peça: 

    <input type="text" class="form-control" name="codigo_mercadoria" placeholder="Código interno" title="Código do Goldbiz" size="10"  value="<?php echo $mercadoria;?>">
    Marca:
    <input type="text" class="form-control" name="marca"  title="Marca da Peça" size="10" value="<?php echo $marca;?>">
    Descrição:
    <input type="text" class="form-control" title=" Descrição com referencia da peça" name="descricao" size="40" value="<?php echo $descricao;?>">
    OS:
    <input type="text" class="form-control" name="os" title="OS da venda" size="10" value="<?php echo $os;?>">
    Nota Fiscal Nº:
    <input type="text" class="form-control" name="nota_fiscal" title="Número da nota fiscal" size="10" value="<?php echo $nota;?>"><br>
    
    Data da Venda:
    <input type="date" class="form-control" name="data_venda" title="Data da venda" size="15" value="<?php echo $data_venda;?>" readonly><br>
    </fieldset><br>
    <fieldset><legend>Abertura de Assistencia</legend>


    Data Pedido de Garantia:
    <input type="date" class="form-control" name="data_garantia" title="Data da abertura da garantia" size="15" value="<?php echo $data_chamado;?>" readonly>
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


    </select>
    Status Garantia:
    <select class="form-control" name="status_garantia" value="" required>

      <option value="<?php echo $id_status;?>"><?php echo $status;?></option>
      <?php

        if($row_status >0){

          foreach ($query_status as $status_gan) {

            $status_garantia=$status_gan['status'];
            $id_status_garantia=$status_gan['id_status'];

        echo "<option value='$id_status_garantia'>$status_garantia</option>";


              }
        }


      ?>


    </select><br>-->
    Anexar imagens:<br><sub style="color:red;">Anexar nota fiscal e fotos da mercadoria avariada</sub><br>
		<input type="file" name ="arquivo[]" accept ="image/*" multiple id="addFotoGaleria" required>
    
    <br><br>
    

	
	<div class="galeria"></div><br>
    Status:<input type="text" class="form-control" name="status_garantia" value="<?php echo $status?>" readonly><br>

    Pendencia:<br><textarea class="form-control" title="Até 200 caracteres" name="pendencia"  maxlength="200" readonly style="color: red;"><?php echo $pendencia;?></textarea><br>

    Avaria:<br><textarea class="form-control" title="Até 200 caracteres" name="avaria"  maxlength="200" ><?php echo $avaria;?></textarea><br>
    </fieldset>

    <button type="submit" class="btn btn-primary"  id='bt1' name="up" >Alterar</button>

  

  </form>
  </div>
		</section>
</div>
<script>

$(function() {
// Pré-visualização de várias imagens no navegador
var visualizacaoImagens = function(input, lugarParaInserirVisualizacaoDeImagem) {

    if (input.files) {
        var quantImagens = input.files.length;

        for (i = 0; i < quantImagens; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                $($.parseHTML('<img class="miniatura">')).attr('src', event.target.result).appendTo(lugarParaInserirVisualizacaoDeImagem);
            }

            reader.readAsDataURL(input.files[i]);
        }
    }

};

$('#addFotoGaleria').on('change', function() {
    visualizacaoImagens(this, 'div.galeria');
});
});

    </script>
</body>
</html>