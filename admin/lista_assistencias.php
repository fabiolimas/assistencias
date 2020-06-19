<?php
 


    include ("../conexao.php");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../fonts/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <title>Assistência</title>
</head>
<body>

    <div id="interface_assist">
       
    
        <?php

            echo"<table>";
            echo"<tr id='titulo'>";
            echo"<td>Loja</td>";
            echo"<td>Cod. Mercadoria</td>";
            echo"<td>Cliente</td>";
            echo"<td>Descrição</td>";
              echo"<td>OS</td>";
            echo"<td>Nota Fiscal</td>";
            echo"<td>Data da Venda</td>";
            echo"<td>Abertura de chamado</td>";
            echo"<td>Avaria</td>";
            echo"<td>Status</td>";
            echo"<td>Opções</td>";
            echo"</tr>";

           
            $pagina=isset($_GET['pagina'])?$_GET['pagina']:1;
            $os=isset($_POST['assistencias'])?$_POST['assistencias']:"";

            $assistencias="SELECT * FROM garantias";
            $query_assist=mysqli_query($con, $assistencias);
            $rows=mysqli_num_rows($query_assist);
            
            $limite_de_itens=6;
            
            $num_paginas=ceil($rows/$limite_de_itens);
            
            $inicio=($limite_de_itens*$pagina)-$limite_de_itens;
            $find="SELECT g.id, l.loja, g.id_mercadoria, g.cliente, g.descricao, g.os, g.nota_fiscal, g.data_venda, g.data_garantia, g.avaria,sg.status  FROM garantias as g join lojas as l on g.id_loja=l.id_loja join status_garantia as sg on g.id_status_garantia=sg.id_status  where g.os like '%$os%' or cliente like '%$os%' limit $inicio, $limite_de_itens";
            $query=mysqli_query($con, $find);




            if($rows >0){


                foreach ($query as  $garantias) {

                    $id=$garantias['id'];
                    $loja=$garantias['loja'];
                    $cliente=$garantias['cliente'];
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
                    echo"<td>".$cliente."</td>";
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
                        case "Pendencia":
                            echo"<td><span class='pendencia'>".$status."</span></td>";
    
                            break;
    



                    }
                    
                    echo"<td><a href='alterar_assistencia.php?id=$id'><span class='far fa-edit acoes' title='Editar'></span></a>|<a href='excluir_assistencia.php?id=$id'><span class='far fa-trash-alt acoes' title='Excluir'></span></a>|<a href='visualizar.php?id=$id'><span class='far fa-eye acoes' title='Visualizar'></span></a></td>";
                    echo"</tr>";
                }

               
            }

 echo"</table>";


        ?>
 
        <nav>


            <?php
                    echo "<a href='assistencias.php'> <span class='paginas'>Inicio</span> </a>";
                for($i=1;$i<$num_paginas+1;$i++){

                    echo "<a href='lista_assistencias.php?pagina=$i'> <span class='paginas'>$i</span> </a>";
                }


            ?>
        </nav>
   
</div>

</body>
</html>