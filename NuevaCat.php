<?php 
session_start();
require_once("modelo/categoria_model.php");
$obj = new Categoria_Model();
if (isset ($_POST['descripcion'])) {
	# code...
	$datos = array('descripcion' => $_POST['descripcion']);
	$obj->insert ($datos);
	header('Location: categoria.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Nueva Categoria</title>
</head>
<body>
   <h1>Nueva Categoria</h1>
   <form action="" method="POST">
   <table> 
   	<tr>
   		<td>Descripcion:</td>
   		<td><input type="text" name="descripcion" placeholder="Descripcion" required="true"></td>
   	</tr>
   	
   	   	<tr>
   		<td colspan="2"><input type="submit" name="Enviar"></td>
   	</tr>
   </table>
   </form>
</body>
</html>