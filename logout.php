<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Logout</title>
</head>
<body>
<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['carrito']);
header('Location: index.php');
?>
</body>
</html>