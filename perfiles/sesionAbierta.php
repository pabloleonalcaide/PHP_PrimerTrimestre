<!DOCTYPE html>
<!--
Ventana para confirmar login con éxito
-->
 <html lang="es">
    <head>
        <title>Login con éxito</title>
        <meta charset="UTF-8" />
        <style>
          h1{text-align: center; color:green;}
        </style>
    </head>
    <body>    	
	<?php
    include("./functions.php");
	$name = $_GET['nombre'];
	$profile = $_GET['perfil'];
	
	echo '<h1>Has accedido como '.$name.' </h1>
	<h2>Recuerda cerrar sesión antes de salir</h2>';

	showInfo($profile);

	showMenu($profile);


	
?>