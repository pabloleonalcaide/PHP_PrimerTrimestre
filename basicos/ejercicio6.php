<!DOCTYPE html>
<!--Escribir los números 1 al 10-->
 <html lang="es">
	<head>
		<title> Ejercicio 6 </title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<h3>Mostrando los números del 1 al 10 </h3>
		<h2>Pablo León Alcaide</h2>
	<?php
	/*
	* @author Pablo Leon Alcaide
	* @version 1.0
	*/
	include '../verCodigo.php';
	if(isset($_POST['ver_codigo'])){

    verCodigo(__FILE__);

	}else{
		for($i=1; $i<=10; $i++){
		echo $i.' - ';
		}
	botonVer();
	}

	?>
	</body>
</html>
