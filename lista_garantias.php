<?php
    session_start();
    if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }


    include ("conexao.php");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="fonts/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <title>Assistências</title>
</head>
<body>
    <div id="interface">
    
        <?php

            echo"<table>";
            echo"<tr id='titulo'>";
            echo"<td>Loja</td>";
            echo"<td>Cod. Mercadoria</td>";
            echo"<td>Descrição</td>";
              echo"<td>OS</td>";
            echo"<td>Nota Fiscal</td>";
            echo"<td>Data da Venda</td>";
            echo"<td>Abertura de chamado</td>";
            echo"<td>Avaria</td>";
            echo"<td>Status</td>";
            echo"<td>Opções</td>";
            echo"</tr>";


            $os=isset($_POST['os'])?$_POST['os']:"";

            $find="SELECT g.id, l.loja, g.id_mercadoria, g.descricao, g.os, g.nota_fiscal, g.data_venda, g.data_garantia, g.avaria,sg.status  FROM garantias as g join lojas as l on g.id_loja=l.id_loja join status_garantia as sg on g.id_status_garantia=sg.id_status  where g.os like '%$os%'";
            $query=mysqli_query($con, $find);
            $rows=mysqli_num_rows($query);
            

            if($rows >0){


                foreach ($query as  $garantias) {

                    $id=$garantias['id'];
                    $loja=$garantias['loja'];
                    $mercadoria=$garantias['id_mercadoria'];
                    $descricao=$garantias['descricao'];
                    $os=$garantias['os'];
                    $nota=$garantias['nota_fiscal'];
                    $data_venda=$garantias['data_venda'];
                    $data_chamado=$garantias['data_garantia'];
                    $avaria=$garantias['avaria'];
                    $status=$garantias['status'];

                    echo"<tr id='lista'>";
                    echo"<td>".$loja."</td>";
                    echo"<td>".$mercadoria."</td>";
                    echo"<td>".$descricao."</td>";
                    echo"<td>".$os."</td>";
                    echo"<td>".$nota."</td>";
                    echo"<td>".date('d-m-Y', strtotime($data_venda))."</td>";
                    echo"<td>".date('d-m-Y', strtotime($data_chamado))."</td>";
                    echo"<td>".$avaria."</td>";


                    switch($status){
                        case "Concluida":

                        echo"<td><span class='aceito'>".$status."</span></td>";

                        break;

                        case "Aguardando":
                        echo"<td><span class='aguardando'>".$status."</span></td>";

                        break;

                          case "Cancelada":
                        echo"<td><span class='recusado'>".$status."</span></td>";

                        break;



                    }
                    
                    echo"<td><a href='alterar.php?id=$id'><span class='far fa-edit acoes'></span></a>|<a href='visualizar.php?id=$id'><span class='far fa-eye acoes'></span ></a></td>";
                    echo"</tr>";
                }

               
            }

 echo"</table>";


        ?>
    
</div>
</body>
</html>