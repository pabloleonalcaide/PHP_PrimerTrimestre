<?php
include '../verCodigo.php';
/*
*3.- Cargar fecha de nacimiento en una variable y calcular la edad.
* @Author Pablo Leon Alcaide
* @Version 1.0
*/
if(isset($_POST['ver_codigo'])){

	verCodigo(__FILE__);
}else{
#Para calcular el dia mes y año actual
$day=date(j);
$month=date(n);
$year=date(Y);

#Para almacenar la fecha de nacimiento
$birthday=9;
$birthmonth=9;
$birthyear=1988;

//Si aun no ha llegado al dia, restamos un año
if (($birthmonth == $month) && ($birthday > $day)) {
	$year=($year-1);
}

//Si aun no ha llegado al mes, restamos un año
if ($birthmonth > $month) {
	$year=($year-1);
}

$edad=($year-$birthyear);

echo "La edad correspondiente es: ".$edad." años";
botonVer();

}
?>
