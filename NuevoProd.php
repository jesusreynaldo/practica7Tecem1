<?php 
session_start();
require_once("modelo/producto_model.php");
require_once("modelo/categoria_model.php");
$obj = new Categoria_Model();
$prod= new Producto_Model();
if (isset ($_POST['descripcion'])) {
	# code...
	$datos = array('descripcion' => $_POST['descripcion'],'costo_unitario'=>$_POST['costo_unitario'],'cantidad'=>$_POST['cantidad'],'stock_minimo'=>$_POST['stock_minimo'],'id_categoria'=>$_POST['id_categoria'] );
	$prod->insert ($datos);
	header('Location: productos.php');
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
         <td>Costo Unitario:</td>
         <td><input type="number" name="costo_unitario" placeholder="costo_unitario" required="true"></td>
      </tr>
      <tr>
         <td>Cantidad:</td>
         <td><input type="number" name="cantidad" placeholder="cantidad" required="true"></td>
      </tr>
       <tr>
         <td>Stock Minimo:</td>
         <td><input type="number" name="stock_minimo" placeholder="stock_minimo" required="true"></td>
      </tr> 
      <tr>
         <td>Categoria</td>
         <td><select name="id_categoria">
      <?php 
         $filas=$obj->get_all();
         foreach ($filas as $fila) {
         
       ?>
         <option value="<?=$fila['id']?>"><?=$fila['descripcion']?></option>

      
      <?php } ?>
 </select> </td>
      </tr> 
       	
   	   	<tr>
   		<td colspan="2"><input type="submit" name="Enviar"></td>
   	</tr>
   </table>
   </form>
</body>
</html>