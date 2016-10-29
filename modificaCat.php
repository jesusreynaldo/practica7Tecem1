<?php 
session_start();
require_once("modelo/categoria_model.php");
$obj = new Categoria_Model();
if (isset ($_POST['id'])) {
	# code...
   $id=$_POST['id'];
	$datos =  array('descripcion' => $_POST['descripcion'] );
   $obj->update($id,$datos);
	  
	header('Location: categoria.php');
}
else
{
   if (isset($_GET['id'])) {
      # code...
      $id = $_GET['id'];
      $cat = $obj->get_by($id);
      
   }
}   
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Modificar Usuario</title>
</head>
<body>
   <h1>Modificar Usuario</h1>
   <form action="" method="POST">
    <input type="hidden" name="id" value="<?=$id?>">
   <table> 
   	<tr>
   		<td>Nombre:</td>
   		<td><input type="text" name="descripcion" placeholder="Nombre" required="true" value="<?=$cat['descripcion']?>"></td>
   	</tr>
   	
   	<tr>
   		<td colspan="2"><input type="submit" name="Enviar"></td>
   	</tr>
   </table>
   </form>
</body>
</html>