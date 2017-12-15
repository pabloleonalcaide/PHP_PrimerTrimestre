<!DOCTYPE html>
<!-- Mostrar paleta de colores.-->
 <html lang="es">
	<head>
		<title> Ejercicio 9 </title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<h3>Mostrando paleta de colores </h3>
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
		echo '<table>';
		         for ($r = 0; $r < 256; $r += 16) {
                    for ($g = 0; $g < 256; $g += 16) {
                        for ($b = 0; $b < 256; $b += 16) {
                            echo "<td style='background-color: rgb($r, " . "$g, $b);'>";
                            echo '('. $r . ',' . $g.',' .$b .')';
                            echo "</td>";

                            if ($b > ((255 - 16))) {
                                echo("</tr><tr>");

                            }
                        }
                    }
                        echo("</tr><tr></tr>");

                }
      echo '</table>';
		botonVer();
	}

	?>
	</body>
</html>
