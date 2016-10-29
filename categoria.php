
<?php
require_once('modelo/categoria_model.php');
session_start();
if ($_SESSION['login']!='ok') {
	header('Location: index.php');
}
$obj = new Categoria_Model();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">	
	<title>Supermercados Kristal</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<div id="cabecera">
<div style="padding-left:70%; color:#fff;">Usuario: <?=$_SESSION['nombreus']?></div>
	<header>	
	<h1>Almacen "Don Manolo"</h1>
		<nav>
			<ul>
				<li><a href="panel.php">Inicio</a> </li>
				<li><a href="carrito.php">Ventas</a> </li>
				<li><a href="productos.php">Productos</a> </li>
				<li><a href="categoria.php">Categorias</a> </li>
				<li><a href="logout.php">salir</a></li>
			</ul>
		</nav>
	</header>
</div>
<div id="contenido">
<div id = "menu2">
	
</div>
	<section>
		<h1>Lista de Productos</h1>
 	<a href="NuevoProd.php">Nuevo</a>
 	<?php 
	$result = $obj->get_all();  
 	?>
 	<table border="1" cellspacing="0">
 		<tr>
 			<th>Id</th>
 			<th>Descripcion</th>
 			
 			<th></th>
 			<th></th>
 		</tr>
	<?php foreach ($result as $fila) {
		# code...
	
	 	 	# code...
	 	echo "<tr>";
	 		echo "<td>".$fila['id']."</td>";
	 		echo "<td>".$fila['descripcion']."</td>";
	 		
	 		?>
	 		<td><a href="modificaCat.php?id=<?=$fila['id']?>">Modificar</a></td>
	 		<td><a href="eliminaCat.php?id=<?=$fila['id']?>" onclick="return(confirm('seguro que quiere Eliminar?'))">Eliminar</a></td>
	 		
	 	<?php echo "</tr>";

	 	?>
 	
 <?php 
  }

?>
</table>
		
	</section>	
</div>
<p>::..</p>
<div id="pie">
	<footer>
		<p>&copy; Emergentes 2016</p>
	</footer>
</div>
</body>
</html>
