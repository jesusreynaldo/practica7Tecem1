<?php 
session_start();
require_once("modelo/producto_model.php");
$producto = new Producto_Model();
if(isset($_POST['idprod']) && $_POST['idprod'] != "0")
{
	$registro = array();
	$fila = $producto->get_by($_POST['idprod']);
  $registro ['idprod']=$fila['id'];
  $registro ['descripcion']=$fila['descripcion'];
	$registro['costo']=$fila['costo_unitario'];
	$registro['cantidad']=$_POST['cantidad'];
  $registro['total']=$fila['costo_unitario']*$_POST['cantidad'];
	$_SESSION['carrito'][]=$registro;
	$_POST['producto']='0';
}

$dato =  $producto->get_all();
?>
<!DOCTYPE html>
<html lang ="es">
<head>
	<meta charset="utf-8">
	<title>Carrito</title>
</head>
<body>
  <h1>Carrito de compras</h1>
  <form action="" method="post"> 
     <p>
     Producto:
       <select name="idprod">
         
         <?php foreach ($dato as $item) {?>
         <option value="<?=$item['id']?>"><?=$item['descripcion']?></option>   
         <?php } ?>
       </select>
     </p>
     Cantidad: <input type="number" name="cantidad" value="0"> 
     <br>
     <input type="submit" name="enviar">
  </form>
  <p></p>
  <table border="1" cellpadding="5px" cellspacing="0">
    <tr>
      <th>Id</th>     
      <th>Producto</th>
      <th>Costo</th>
      <th>Cantidad</th>
      <th>Total</th>
    </tr>
      <?php if(isset($_SESSION['carrito']))
      {
        foreach ($_SESSION['carrito'] as $it){?>    
    <tr>
      <td><?php echo $it['idprod'];?></td>
      <td><?php echo $it['descripcion'];?></td>
      <td><?php echo $it['costo'];?></td>
      <td><?php echo $it['cantidad'];?></td>
      <td><?php echo $it['total'];?></td>
    </tr>
  <?php }
   }?>
  </table>
  <a href="guardaVentas.php">Guardar Ventas</a>
</body>
</html>