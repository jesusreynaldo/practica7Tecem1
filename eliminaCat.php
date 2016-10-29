<?php
require_once('modelo/categoria_model.php');

if (isset($_GET['id'])) {
	# code...
	$obj= new Categoria_Model(); 
	$id= $_GET['id'];
	$obj->delete($id);
	header("Location: categoria.php");
}
else 
{
	echo 'no se elimino nada';
}

 ?>