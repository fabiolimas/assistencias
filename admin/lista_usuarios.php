<?php
 

    include_once ("../conexao.php");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <title>usuarios</title>
</head>
<body>
    <div id="interface_assist">
    
        <?php

            echo"<table>";
            echo"<tr id='titulo'>";
            echo"<td>Nome</td>";
            echo"<td>E-mail</td>";
            echo"<td>Telefone</td>";
            echo"<td>Usuário</td>";
            echo"<td>Permissão</td>";
            echo"<td>Status</td>";
            echo"<td>Opções</td>";
            echo"</tr>";

             $pagina=isset($_GET['pagina'])?$_GET['pagina']:1;


             $usuarios="SELECT * FROM usuarios";
             $query_usuarios=mysqli_query($con, $usuarios);

             $rows=mysqli_num_rows($query_usuarios);

              $limite_de_itens=6;
            
            $num_paginas=ceil($rows/$limite_de_itens);
            
            $inicio=($limite_de_itens*$pagina)-$limite_de_itens;


            $usuario=isset($_POST['usuarios'])?$_POST['usuarios']:"";

            $find="SELECT * FROM usuarios where usuario like '%$usuario%' limit $inicio, $limite_de_itens";
            $query=mysqli_query($con, $find);
            $rows=mysqli_num_rows($query);
            

            if($rows >0){


                foreach ($query as  $usuarios) {

                    $id=$usuarios['id'];
                    $nome=$usuarios['nome'];
                    $email=$usuarios['email'];
                    $telefone=$usuarios['telefone'];
                    $usuario=$usuarios['usuario'];
                    $status=$usuarios['status'];
                    $permissao=$usuarios['permissao'];


                    
                   

                    echo"<tr id='lista'>";
                 
                    echo"<td>".$nome."</td>";
                    echo"<td>".$email."</td>";
                    echo"<td>".$telefone."</td>";
                    echo"<td>".$usuario."</td>";
                   
                        switch($permissao){
                        case "1":

                        echo"<td>Administrador</span></td>";

                        break;

                        case "0":
                        echo"<td>Editor</span></td>";

                        break;

                    }
                    



                    switch($status){
                        case "1":

                        echo"<td><span class='aceito'>Ativo</span></td>";

                        break;

                        case "0":
                        echo"<td><span class='recusado'>Inativo</span></td>";

                        break;

                    }
                    
                    echo"<td><a href='alterar.php?id=$id'><img src='../images/editar.png' class='acoes' title='Editar'></a>|<a href='excluir.php?id=$id'><img src='../images/excluir.png' title='Excluir' class='acoes'></a></td>";
                    echo"</tr>";
                }

               
            }

 echo"</table>";


        ?>
        <nav>


            <?php
                    echo "<a href='usuarios.php'> <span class='paginas'>Inicio</span> </a>";
                for($i=1;$i<$num_paginas+1;$i++){

                    echo "<a href='lista_usuarios.php?pagina=$i'> <span class='paginas'>$i</span> </a>";
                }


            ?>
        </nav>
    
</div>
</body>
</html>