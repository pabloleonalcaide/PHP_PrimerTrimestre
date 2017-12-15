<?php
/*
* 5.- Lista de enlaces en función del perfil de usuario.
* @author Pablo Leon
*/
include '../verCodigo.php';

if(isset($_POST['ver_codigo'])){

	verCodigo(__FILE__);

}else{
	$rol = 'Director';
	$link1 = '';
	$link2 = '';
	$link3 = '';

	if ($rol === 'Empleado'){
		$link1 = '<a href="#" >Tareas </a>';
		$link2 = '<a href="#" >Nómina </a>';
		$link3 = '<a href="#" >Horario </a>';
	}else if ($rol === 'Director'){
		$link1 = '<a href="#" >Modificar Sueldo </a>';
		$link2 = '<a href="#" >Despedir </a>';
		$link3 = '<a href="#" >Ver Ingresos </a>';
	}else if ($rol === 'Programador'){
		$link1 = '<a href="#" >Abrir Depurador </a>';
		$link2 = '<a href="#" >Modificar Código </a>';
		$link3 = '<a href="#" >Crear Framework </a>';
	}else{
		$link1 = '<a href="#" >Restringido </a>';
		$link2 = '<a href="#" >Restringido </a>';
		$link3 = '<a href="#" >Restringido </a>';
	}

	echo 'Bienvenido '.$rol.'<br><ul>';
	echo '<li>'.$link1.'</li>';
	echo '<li>'.$link2.'</li>';
	echo '<li>'.$link3.'</li>';
	echo '</ul>';
botonVer();
	}
?>
