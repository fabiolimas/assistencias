<?php

	$host='localhost';
	$user="root";
	$pass="";
	$database="garantia";

	$con=mysqli_connect($host, $user, $pass, $database);
	

mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con,'SET character_set_connection=utf8');
mysqli_query($con,'SET character_set_client=utf8');
mysqli_query($con,'SET character_set_results=utf8');





?>