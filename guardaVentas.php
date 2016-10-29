<?php 
session_start();
require_once('modelo/ventas_model.php');
$venta= new Ventas_Model();
$hoy = getdate();
$fecha=$hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
$data=array();  
foreach ($_SESSION['carrito'] as $dato) {
//echo $dato['idprod']."-".$dato['descripcion']."-".$dato['costo']."-".$dato['cantidad']."-".$dato['total']."<br>";
$data=array('fecha' =>$fecha,'id_producto'=>$dato['idprod'],'cantidad'=>$dato['cantidad'],'total'=>$dato['total'],'id_usuario'=>$_SESSION['idus'] );
$venta->insert($data);
unset($_SESSION['carrito']);
header("Location: panel.php");
//var_dump($data);
	# 1code...
}

 ?>