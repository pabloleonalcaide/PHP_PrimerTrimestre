<?php
include '../verCodigo.php';
/*
* 4.-Cabecera en función de la estación del año.
* @Author Pablo Leon Alcaide
* @Version 1.0
*/
if(isset($_POST['ver_codigo'])){

	verCodigo(__FILE__);

}else{

    $mesActual  = date('n'); // Formato: "3"
 	// Clasificamos los meses en un array
    $primavera  = array(3,4,5);
    $verano     = array(6,7,8);
    $otono      = array(9,10,11);
    $invierno   = array(12,1,2);

    if ( in_array( $mesActual, $primavera ) ) {

        $ruta ='../imagen/primavera.jpeg';

    } elseif ( in_array( $mesActual, $verano ) ) {

        $ruta ='../imagen/verano.jpeg';

    } elseif ( in_array( $mesActual, $otono ) ) {

        $ruta ='../imagen/otono.jpeg';

    } else {

        $ruta ='../imagen/invierno.jpeg';

    }
	echo "<img src=".$ruta." align=center border='0' width='300' height='100'>";

	botonVer();
}
?>
