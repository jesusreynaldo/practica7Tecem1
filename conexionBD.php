<?php 
 $host="localhost";
 $user="root";
 $pass="";
 $bdat="practica6";
 $conn=new mysqli($host,$user,$pass,$bdat);
 if ($conn->connect_errno > 0) {
 	# code...
 	die("Error en la conexion ".$conn->connect_error);
 }

 ?>