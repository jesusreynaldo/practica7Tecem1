<?php 
session_start();
require_once("modelo/producto_model.php");
require_once("modelo/categoria_model.php");
$obj = new Categoria_Model();
$prod= new Producto_Model();
if (isset ($_POST['id'])) {
	# code...
   $idp=$_POST['id'];
	$datos = array('descripcion' => $_POST['descripcion'],'costo_unitario'=>$_POST['costo_unitario'],'cantidad'=>$_POST['cantidad'],'stock_minimo'=>$_POST['stock_minimo'],'id_categoria'=>$_POST['id_categoria'] );
	$prod->update ($idp,$datos);
	header('Location: productos.php');
}
else
{
   
          if (isset($_GET['id'])) 
      {
         # code...

         $id = $_GET['id'];
         $prodelegido= $prod->get_by($id);
         $idc= $_GET['idc'];
      }
   
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Modificar Producto</title>
</head>
<body>
   <h1>Modificar Producto</h1>
   <form action="" method="POST">
   <input type="hidden" name="id" value="<?=$id?>">
   <table> 
   	<tr>
   		<td>Descripcion:</td>
   		<td><input type="text" name="descripcion" placeholder="Descripcion" required="true" value="<?=$prodelegido['descripcion']?>"></td>
   	</tr>
      <tr>
         <td>Costo Unitario:</td>
         <td><input type="number" name="costo_unitario" placeholder="costo_unitario" required="true" value="<?=$prodelegido['costo_unitario']?>"></td>
      </tr>
      <tr>
         <td>Cantidad:</td>
         <td><input type="number" name="cantidad" placeholder="cantidad" required="true" value="<?=$prodelegido['cantidad']?>"></td>
      </tr>
       <tr>
         <td>Stock Minimo:</td>
         <td><input type="number" name="stock_minimo" placeholder="stock_minimo" required="true" value="<?=$prodelegido['stock_minimo']?>" ></td>
      </tr> 
      <tr>
         <td>Categoria</td>
         <td><select name="id_categoria">
      <?php 
         $filas=$obj->get_all();
         foreach ($filas as $fila) {
         if ($idc==$fila['id'] ) {
       ?>
         <option value="<?=$fila['id']?>" selected="selected"><?=$fila['descripcion']?></option>
      <?php } else {?>   
         <option value="<?=$fila['id']?>"><?=$fila['descripcion']?></option>
      <?php } 
      }?>
 </select> </td>
      </tr> 
       	
   	   	<tr>
   		<td colspan="2"><input type="submit" name="Enviar"></td>
   	</tr>
   </table>
   </form>
</body>
</html>