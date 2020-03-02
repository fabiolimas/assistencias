<?php
    session_start();
    if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }


    include_once("../conexao.php");
    include ("../buscas.php");

    $id=$_GET['id'];

  $find="SELECT g.id, l.loja, g.id_mercadoria, g.marca,g.descricao, g.os, g.nota_fiscal, g.data_venda, g.data_garantia, g.avaria,sg.status, sg.id_status FROM garantias as g join lojas as l on g.id_loja=l.id_loja join status_garantia as sg on g.id_status_garantia=sg.id_status  where g.id='$id'";
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
                  }}else{
                    echo "Erro: ".mysqli_error($con);
                  }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../fonts/css/all.css">
    
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
        <section id="conteudo"> <a href="assistencias.php"><i class="fas fa-long-arrow-alt-left"></i> Voltar</a><hr>
  <h1>Nova Assistencia</h1>

  <form method="post" action="processa_alteracao_assist.php">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    
    Loja: <input type="text" name="loja" value="<?php echo $loja;?>" readOnly>
    <fieldset><legend>Dados da Venda</legend>
    Código da Peça: 
    <input type="text" name="codigo_mercadoria" placeholder="Código interno" title="Código do Goldbiz" size="10"  value="<?php echo $mercadoria;?>">
    Marca:
        <input type="text" name="marca"  title="Marca da Peça" size="10" value='<?php echo $marca;?>'>
    Descrição:
    <input type="text" title=" Descrição com referencia da peça" name="descricao" size="40" value="<?php echo $descricao;?>">
    OS:
    <input type="text" name="os" title="OS da venda" size="10" value="<?php echo $os;?>">
    Nota Fiscal Nº:
    <input type="text" name="nota_fiscal" title="Número da nota fiscal" size="10" value="<?php echo $nota;?>">
    
    Data da Venda:
    <input type="date" name="data_venda" title="Data da venda" size="15" value="<?php echo $data_venda;?>"><br>
    </fieldset><br>
    <fieldset><legend>Abertura de Assistência</legend>
    Data Pedido de Garantia:
    <input type="date" name="data_garantia" title="Data da abertura da garantia" size="15" value="<?php echo $data_chamado;?>">
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
    Status Garantia:
    <select name="status_garantia" value="" required>

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


    </select><br>

    Avaria:<br><textarea title="Até 200 caracteres" name="avaria"  maxlength="200"><?php echo $avaria;?></textarea><br>
    </fieldset>

    <input type="submit" name="" Value="Alterar" id="btn">

  

  </form></section>



        <footer id="rodape">Copyright - 2020</footer>
    
</div>
</body>
</html>

  

  

  


