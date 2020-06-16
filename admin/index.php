<?php
    session_start();

    if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }

include ("../conexao.php");



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

          
          <label for="btMenu"><span class="fas fa-bars miniMenu" title="Menu"></span></label>
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
        <section id="conteudo">
  

  

            

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);      
      function drawChart() {
        

        var data = google.visualization.arrayToDataTable([
          ['Lojas', 'Assistencias'],
            
            <?php 
           
              $lojas="SELECT * from lojas";
                $query_lojas=mysqli_query($con, $lojas);
              
            
                while($lojass=mysqli_fetch_array($query_lojas)){
                  $loja=$lojass['loja'];
                  $id_loja=$lojass['id_loja'];                 
                
              
              $teste="SELECT  g.id_loja, l.loja, COUNT(*) as contadorl FROM garantias as g  join lojas as l on l.id_loja= g.id_loja where g.id_loja='$id_loja' group by g.id_loja";
              
       
            $querys=mysqli_query($con, $teste); 
            $result=mysqli_num_rows($querys);

            
           

            while($garantias=mysqli_fetch_array($querys)){
              $loja_nome=$garantias['loja'];
              $contado=$garantias['contadorl'];   
    ?>
          ["<?php echo $loja; ?>",   <?php echo $contado;?>],
          <?php }?>
            <?php }?>         
       
        ]);

        var options = {
          title: 'Assistências por Lojas',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

        chart.draw(data, options);

      }

      //-------------------------Fim Grafico Assistencias-----------------------------------//


     
    </script>
   
    
    <script type="text/javascript">

       //-------------------------Inicio Gráfico Marcas--------------------------------------//

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
       var data = google.visualization.arrayToDataTable([
          ['Marcas', 'Assistencias'],
            
            <?php 


              
              $finds="SELECT marca from garantias";
              $query_find=mysqli_query($con, $finds);

              while($linhas=mysqli_fetch_array($query_find)){

                $grife=$linhas['marca'];


               
              $marcas="SELECT marca, COUNT(*) as contador FROM garantias where marca='$grife'";
              
       
              $query=mysqli_query($con, $marcas);  
            
            while($marca=mysqli_fetch_array($query)){
              $marcas=mb_strtoupper($marca['marca']);
              $contador=$marca['contador'];

                        

    ?>
          ["<?php echo $marcas; ?>",  <?php echo $contador?>],
          <?php }?>
          <?php }?>
          
                    
       
        ]);

        var options = {
          title: 'Assistencias por Marcas',
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);

      }
      
    </script>
      <ul id="graficos">
    <li><div id="piechart_3d" style="width: 600px; height: 300px;"></div></li>
    <li><div id="piechart" style="width: 600px; height: 300px;"></div></li>
  </ul>
  
</section>


        <footer id="rodape">Copyright - 2020</footer>
    
</div>
</body>
</html>