
<?php
require_once('modelo/producto_model.php');
session_start();
if ($_SESSION['login']!='ok') {
	header('Location: index.php');
}
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
		
			<h1>Inicio</h1>
			<h2>Productos con poco stock</h2>
			<table cellspacing="0"  border="1">
				<tr>
				<th>id</th>
				<th>descripción</th>	 
				<th>costo_unitario</th>
				<th>cantidad</th>
				<th>stock_minimo</th>
				</tr>
				<?php 
				$prodstockmin = new Producto_Model();
				$filas= $prodstockmin->get_min_stock();
				foreach ($filas as $key=>$item) {
					?>
					 <tr>
					        <th><?=$item['id']?></th>
							<th><?=$item['descripcion']?></th>	 
							<th><?=$item['costo_unitario']?></th>
							<th><?=$item['cantidad']?></th>
							<th><?=$item['stock_minimo']?></th>	
					 </tr>	
					<?php
					}	
				 ?>
			</table>
			<p>::..</p>
			<p>::..</p>
			<h2>Productos mas vendidos</h2>
		<table cellspacing="0"  border="1">
				<tr>
				<th>id</th>
				<th>descripción</th>	 
				<th>cantidad vendida</th>
			
				</tr>
				<?php 
				
				$filas2= $prodstockmin->get_prod_masventa();
				foreach ($filas2 as $it) {
					if (isset($it['cant'])) {
					?>
					 <tr>
					        <th><?=$it['id']?></th>
							<th><?=$it['descripcion']?></th>	
							<th><?=$it['cant']?></th>							
					 </tr>	
					<?php
					}
					}	
				 ?>
			</table>
<p>::..</p>
			<p>::..</p>
			<h2>Usuarios con mas ventas</h2>
		<table cellspacing="0"  border="1">
				<tr>
				
				<th>nombre</th>	 
				<th>cantidad vendida</th>
			
				</tr>
				<?php 
				
				$filas3= $prodstockmin->get_us_masventa();
				foreach ($filas3 as $it) {
					if (isset($it['cant']) && isset($it['nombre']) ) {
					?>
					 <tr>
							<th><?=$it['nombre']?></th>	
							<th><?=$it['cant']?></th>							
					 </tr>	
					<?php
					}
					}	
				 ?>
			</table>
<p>::..</p>
			<p>::..</p>
	</section>	
</div>
<div id="pie">
	<footer>
		<p>&copy; Emergentes 2016</p>
	</footer>
</div>
</body>
</html>