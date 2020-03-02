<?php
   


    include ("../conexao.php");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <title>Lojas</title>
</head>
<body>
    <div id="interface_assist">
    
        <?php

            echo"<table>";
            echo"<tr id='titulo'>";
            echo"<td>ID Loja</td>";
            echo"<td>Loja</td>";
            echo"<td>Razão Social</td>";
            echo"<td>CNPJ</td>";
            echo"<td>Endereço</td>";
            echo"<td>Cidade</td>";
            echo"<td>UF</td>";
            echo"<td>Telefone</td>";
            echo"<td>Status</td>";
            echo"<td>Opções</td>";
            echo"</tr>";

            $pagina=isset($_GET['pagina'])?$_GET['pagina']:1;



                $lojas="SELECT * from lojas";
                $query_lojas=mysqli_query($con, $lojas);

                $rows=mysqli_num_rows($query_lojas);


            $limite_de_itens=6;
            
            $num_paginas=ceil($rows/$limite_de_itens);
            
            $inicio=($limite_de_itens*$pagina)-$limite_de_itens;

            $loja=isset($_POST['lojas'])?$_POST['lojas']:"";

            $find="SELECT * FROM lojas where loja like '%$loja%' limit $inicio, $limite_de_itens";
            $query=mysqli_query($con, $find);
            $rows=mysqli_num_rows($query);
            

            if($rows >0){


                foreach ($query as  $lojas) {

                    $id=$lojas['id_loja'];
                    $loja=$lojas['loja'];
                    $rasaosocial=$lojas['rsocial'];
                    $cnpj=$lojas['cnpj'];
                    $endereco=$lojas['endereco'];
                    $cidade=$lojas['cidade'];
                    $uf=$lojas['uf'];
                    $status=$lojas['status'];
                    $telefone=$lojas['fone'];
                   

                    echo"<tr id='lista'>";
                    echo "<td>".$id."</td>";
                    echo"<td>".$loja."</td>";
                    echo"<td>".$rasaosocial."</td>";
                    echo"<td>".$cnpj."</td>";
                    echo"<td>".$endereco."</td>";
                    echo"<td>".$cidade."</td>";
                    echo"<td>".$uf."</td>";
                    echo"<td>".$telefone."</td>";



                    switch($status){
                        case "1":

                        echo"<td><span class='aceito'>Ativa</span></td>";

                        break;

                        case "0":
                        echo"<td><span class='recusado'>Inativa</span></td>";

                        break;

                       



                    }
                    
                    echo"<td><a href='alterarLoja.php?id=$id'><img src='../images/editar.png' class='acoes' title='Editar'></a>|<a href='excluirLoja.php?id=$id'><img src='../images/excluir.png' title='Excluir' class='acoes'></a></td>";
                    echo"</tr>";
                }

               
            }

 echo"</table>";


        ?>
          <nav>


            <?php
                    echo "<a href='lojas.php'> <span class='paginas'>Inicio</span> </a>";
                for($i=1;$i<$num_paginas+1;$i++){

                    echo "<a href='lista_lojas.php?pagina=$i'> <span class='paginas'>$i</span> </a>";
                }


            ?>
        </nav>
    
</div>
</body>
</html>