<?php
    ob_start();
    /**
    * Sistema de autentificación a través de las características del protocolo http.
    * @author Pablo Leon
    * @version 1.0
    */
	include './verCodigo.php';
?>
<!DOCTYPE html>
	<html lang="es">
		<head>
    	<meta charset="UTF-8">
        <title>Autentificación por http</title>
	</head>
	<body>
       
    <?
    /* por http no se cierra sesión */
    session_start();
     if ( (!isset($_SERVER['PHP_AUTH_USER']) and !isset($_SERVER['PHP_AUTH_PW'])) or 
         ($_SERVER['PHP_AUTH_USER'] != "usuario" and $_SERVER['PHP_AUTH_PW'] != "clave") ) {
        header('WWW-Authenticate: Basic realm="Area Privada"');
        
        header('HTTP/1.0 401 Unauthorized');
        
        echo "<p>Permiso Denegado.</p>";
    }else {
        echo "<p>Permiso Concedido</p>";
        
        echo "<p>Bienvenido al sitio web, {$_SERVER['PHP_AUTH_USER']}.</p>";
    }
    if(isset($_POST['ver_codigo'])){
	  verCodigo(__FILE__);
	}
	echo'<br />';
	botonVer();
  	echo'<br />';
  	include('./ultimaVisitaCookie.php');
    echo "<a href='../index.php'>Volver</a>"; 
?> 
    
</body>
</html>