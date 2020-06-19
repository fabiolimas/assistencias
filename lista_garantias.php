<?php
/*	session_start();
	if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
*/

	include ("buscas.php");

?>


	<div class="container interface">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Loja</th>
      <th scope="col">Cliente</th>
      <th scope="col">Cod. Mercadoria</th>
      <th scope="col">Referencia</th>
      <th scope="col">OS</th>
      <th scope="col">Nota Fiscal</th>
      <th scope="col">Data da Venda</th>
      <th scope="col">Abertura de Chamado</th>
      <th scope="col">Avaria</th>
      <th scope="col">Status</th>
      <th scope="col">Opções</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    
        <?php

           


            $os=isset($_POST['os'])?$_POST['os']:"";

            $find="SELECT g.id, l.loja,g.cliente, g.id_mercadoria, g.descricao, g.os, g.nota_fiscal, g.data_venda, g.data_garantia, g.avaria,sg.status  FROM garantias as g join lojas as l on g.id_loja=l.id_loja join status_garantia as sg on g.id_status_garantia=sg.id_status  where g.os like '%$os%' or cliente like '%$os%'";
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
                    $cliente=$garantias['cliente'];

                    echo"<tr id='lista'>";
                    echo"<td>".$loja."</td>";
                    echo"<td>".$cliente."</td>";
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
                        case "Pendencia":
                          echo"<td><span class='pendencia'>".$status."</span></td>";
  
                          break;



                    }
                    
                    echo"<td><a href='alterar.php?id=$id'><span class='far fa-edit acoes' title='Editar'></span></a><a href='visualizar.php?id=$id'><span class='far fa-eye acoes' title='Visualizar'></span ></a></td>";
                    echo"</tr>";
                }

               
            }

 echo"</table>";


        ?>
    
</div>
</body>
</html>