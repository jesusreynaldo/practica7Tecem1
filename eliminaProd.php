<?php
require_once('modelo/producto_model.php');

if (isset($_GET['id'])) {
	# code...
	$obj= new Producto_Model(); 
	$id= $_GET['id'];
	$obj->delete($id);
	header("Location: productos.php");
}
else 
{
	echo 'no se elimino nada';
}

 ?>