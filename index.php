<?php
require_once('modelo/usuario_model.php');
session_start();
//define('USUARIO', 'admin');
//define('PASSWORD', '12345');
$us= new Usuario_Model();
$mensaje="";
if (isset($_POST['usuario']))
{
	$usu=$_POST['usuario'];
	$cla=$_POST['clave'];
	$consulta = "select ifnull(max(id),0) as id from usuario where usuario = '$usu' and clave = '$cla';" ;
	$dato = $us->ejecutar_query2($consulta);
	$idus = $dato['id'];
	if ($idus > 0)
		{
			    $fila =$us->get_by($idus);
				$_SESSION['login']='ok';
				$_SESSION['nombreus']=$fila['nombre'];
				$_SESSION['idus']=$idus;
				header('Location: panel.php');	
		}
		else
		{
			$mensaje="Error de autenticacion";
			echo $consulta."--".$idus;
			
		}

}
?>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body style="background:gray;">
<div style="width:100%; height:100px;"></div>
<div id="izquierda" style="width:30%;height:200px;float:left"></div>
<div id="centro" style="background-color:#f16529; width:30%;height:200px; float:left;color:white;padding:20px;">
	<h1 style="margin-left:30%;">Login</h1>
	<form action="" method="POST">
		<p><LABEL>Usuario:</LABEL>
		<input type="text"  name ="usuario" required><br></p>
		<p><LABEL>Clave:</LABEL>
		<input type="password"  name ="clave" required><br></p>
		<input type="submit" value="enviar">
		<p><?=$mensaje?></p>
	</form>
</div>
<div id="derecha" style="width:30%;height:200px;float:left;"></div>	

</body>
</html>