<?php
include ("conexao.php");


//busca lojas

$find="SELECT * FROM lojas where status='1'";
$query=mysqli_query($con, $find);
$row=mysqli_num_rows($query);


//busca status do fornecedor

$find_fornecedor="SELECT * FROM status_fornecedor";
$query_forn=mysqli_query($con, $find_fornecedor);
$row_forn=mysqli_num_rows($query);



//Busca status da garantia
$find_status="SELECT * FROM status_garantia";
$query_status=mysqli_query($con, $find_status);
$row_status=mysqli_num_rows($query);

?>
