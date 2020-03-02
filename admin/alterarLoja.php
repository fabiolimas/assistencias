<?php
   session_start();
  if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }

  include("../conexao.php");

  $id=$_GET['id'];

   $find="SELECT * FROM lojas where id_loja='$id'";
            $query=mysqli_query($con, $find);
            $rows=mysqli_num_rows($query);
            

            if($rows >0){


                foreach ($query as  $lojas) {

                    $id=$lojas['id_loja'];
                    $loja=$lojas['loja'];
                    $rasaosocial=$lojas['rsocial'];
                    $cnpj=$lojas['cnpj'];
                    $inscest=$lojas['inscest'];
                    $inscmun=$lojas['inscmun'];
                    $endereco=$lojas['endereco'];
                    $telefone=$lojas['fone'];
                    $numero=$lojas['numero'];
                    $cidade=$lojas['cidade'];
                    $bairro=$lojas['bairro'];
                    $ufsalvo=$lojas['uf'];
                    $status=$lojas['status'];

                    switch ($status){

                      case "1":

                      $status="Ativa";
                      $statusnum="1";
                      break;

                      case "0":
                      $status="Inativa";
                      $statusnum="0";
                      break;
                    }

                    
                  }
                }

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
    <a href="lojas.php">Voltar</a>
  
  <h1>Nova Loja</h1>

  <form method="post" action="processa_alteracao_loja.php">
    
      <fieldset><legend>Nova Loja</legend>
        Id:
    <input type="text" name="id" title="Código de identificaçao" size="4" value="<?php echo $id;?>" readOnly>
    Loja:
    <input type="text" name="loja" placeholder="Nome da loja" title="Nome da Loja" size="40" value="<?php echo $loja;?>">  </fieldset>
  <fieldset>
    Razão Social:
    <input type="text" name="rsocial" placeholder="Razão Social" title="Rasão Social" size="40" value="<?php echo $rasaosocial;?>"><br><br>
    CNPJ:
    <input type="text" name="cnpj" placeholder="__.___.___/___.__" title="CNPJ" size="14" maxlength="14" value="<?php echo $cnpj;?>">
    Insc. Estadual:
    <input type="text" name="inscest" title="Inscrição Estadual" size="14" value="<?php echo $inscest;?>">
    Insc. Municipal:
    <input type="text" name="inscmun"  title="Inscrição Municipal" size="14" value="<?php echo $inscmun;?>"></fieldset>
    <fieldset><legend>Endereço</legend>
    Endereço:
    <input type="text" name="endereco" placeholder="" title="Endereço" size="40" value="<?php echo $endereco;?>">
    Número:
    <input type="text" name="numero"  title="Número" size="4" value="<?php echo $numero;?>">
     Bairro:
    <input type="text" name="bairro"  title="Bairro" size="14" value="<?php echo $bairro;?>"><br><br>
    Cidade:<select name="cidade" value="">
        <option value="<?php echo $cidade;?>"><?php echo $cidade;?></option>
        <?php

            $find_city="SELECT * FROM cidade order by nome";
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
    <option value="<?php echo $ufsalvo;?>"><?php echo $ufsalvo;?></option>
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
    <input type="text" name="fone" placeholder="(XX)XXXX-XXXX" title="Telefone" size="34" value="<?php echo $telefone;?>"><br><br>
  </fieldset>
  <fieldset>
    Status:<select value="" name="status">
        <option value="<?php echo $statusnum;?>"><?php echo $status;?></option>
        <option value="1">Ativo</option>
        <option value="0">Inativo</option>

    </select><br>
    
    </fieldset>

    <input type="submit" name="" Value="Alterar" id="btn">

  

  </form>
</div>
</body>
</html>