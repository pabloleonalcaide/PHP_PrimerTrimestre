<?php
ob_start();
include('../verCodigo.php');
/**
* Ejercicio de repaso y preparación para el examen de Entorno Servidor (PHP)
* @author Pablo Leon Alcaide
* @version 1.0
*/

if(!$_GET){
    //header('Location: ./autentificacion/indexAuth.php');
}

?>

<html>
    <head>
        <Title>Galeria</Title>
        <meta charset="utf-8" />
        <meta name="author" content="Pablo Leon" />
    </head>
    <body>
        <h1>Galería</h1>
    </body>
</html>
<?
if(isset($_POST['ver_codigo'])){
  verCodigo(__FILE__);
}else{
    botonVer();
    echo'<br />';
    include('../ultimaVisitaCookie.php');
    ob_end_flush();
}
?>
