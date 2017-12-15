
<!DOCTYPE html>
<!--Sumar los 3 primeros números pares.-->
 <html lang="es">
	<head>
		<title> Ejercicio 7 </title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<h3>Mostrando los tres primeros números pares </h3>
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
		$suma = 0;
		$par = 2;
		for($i=1; $i<=2; $i++){
			$par=$par*2;
			$suma = $suma + $par;
		}
		echo 'la suma es: '. $suma;
	botonVer();
	}

	?>
	</body>
</html>
