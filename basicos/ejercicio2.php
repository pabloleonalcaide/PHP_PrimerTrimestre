<?php
include '../verCodigo.php';
/*Cargar en variables mes y año e indicar el número de días del mes.
* @Author Pablo Leon Alcaide
* @version 1.0
*/
echo "El mes seleccionado tiene ";
if(isset($_POST['ver_codigo'])){

	verCodigo(__FILE__);
}else{
$meses = 4;
$año = 2017;
if ($mes == 2){
	if ($año%4 == 0 && $año%100 != 0|| $año%400 == 0){

		echo "29 días";
	}else{
		echo "28 días";
	}

}else{

	if($meses == 1 ||$meses == 3 ||$meses == 5 ||$meses == 7 ||$meses == 8 ||$meses == 10 ||$meses == 12){
		echo "31 días";
	}
	else{
		echo "30 días";
	}
}
botonVer();
}

?>
