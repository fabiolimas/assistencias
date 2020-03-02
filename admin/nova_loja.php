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
  <title>Lojas</title>
</head>
<body>
  <div id="interface">
    <a href="index.php">Voltar</a>
  
  <h1>Nova Loja</h1>

  <form method="post" action="processa_loja.php">
    
      <fieldset><legend>Nova Loja</legend>
        Id:
    <input type="text" name="id" title="Código de identificaçao" size="4" required>
    Loja:
    <input type="text" name="loja" placeholder="Nome da loja" title="Nome da Loja" size="40" required>  </fieldset>
  <fieldset>
    Razão Social:
    <input type="text" name="rsocial" placeholder="Razão Social" title="Rasão Social" size="40" required><br><br>
    CNPJ:
    <input type="text" name="cnpj" placeholder="__.___.___/___.__" title="CNPJ" size="14" maxlength="14" required>
    Insc. Estadual:
    <input type="text" name="inscest" title="Inscrição Estadual" size="14" required>
    Insc. Municipal:
    <input type="text" name="inscmun"  title="Inscrição Municipal" size="14" required></fieldset>
    <fieldset><legend>Endereço</legend>
    Endereço:
    <input type="text" name="endereco" placeholder="" title="Endereço" size="40" required>
    Número:
    <input type="text" name="numero"  title="Número" size="4" required>
     Bairro:
    <input type="text" name="bairro"  title="Bairro" size="14" required><br><br>
    Cidade:<select name="cidade" value="">
        <option value=''>Selecione sua cidade</option>
        <?php

            $find_city="SELECT * FROM cidade";
            $query_city=mysqli_query($con, $find_city);

            foreach ($query_city as $cidades) {
             
              $cidade=$cidades['nome'];
              $id_cidade=$cidades['id'];
              $uf=$cidades['estado'];

              echo "<option value='$cidade'>$cidade</option>";
            }

        ?>


    </select>
      

    UF:
    <select name="uf" value="">
    <option value=''>UF</option>
        <?php

            $find_city="SELECT * FROM estado";
            $query_city=mysqli_query($con, $find_city);

            foreach ($query_city as $estados) {
             
              $estado=$estados['nome'];
              $id_estado=$estados['id'];
              $uf=$estados['uf'];

              echo "<option value='$uf'>$uf</option>";
            }

        ?>


    </select>
    Telefone:
    <input type="text" name="fone" placeholder="(XX)XXXX-XXXX" title="Telefone" size="34" required><br><br>
  </fieldset>
  <fieldset>
    Status:<select value="" name="status">
        <option value="">Status</option>
        <option value="1">Ativo</option>
        <option value="0">Inativo</option>

    </select><br>
    
    </fieldset>

    <input type="submit" name="" Value="Cadastrar" id="btn">

  

  </form>
</div>
</body>
</html>