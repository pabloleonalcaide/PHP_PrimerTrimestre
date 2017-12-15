<?php
/**
* @author Pablo Leon Alcaide
* @version 1.0
*/
ob_start();
include('../../verCodigo.php');
require('./Imagenes.php');
$extensiones = array('jpg','jpeg','gif','png');
$error = "";
$imagenes = new Imagenes();

echo "<form name='galeria' method='post' action='insertarImagenes.php'
enctype='multipart/form-data'><p style='color:red;'>$error</p>
  <input type='file' name='nombreFichero' accept='image/*'/><br />
  <input type='submit' name='enviar' value='Enviar' /></form>";
 echo"<a href='../menu.php?perfil=administrador'>Regresar</a>";
if (isset($_POST['enviar'])) {
    //coge el fichero subido
    $ficheroSubido = $_FILES['nombreFichero']['name'];
    //separa la extensión del nombre
    $nombre = explode('.', $ficheroSubido);
    //recoge la extensión (último elemento del array generado)
    $extensionFichero = end($nombre);
    $extensionFichero = strtolower($extensionFichero);
    if (in_array($extensionFichero, $extensiones) && $_FILES['nombreFichero']['size']<2000000) {
        $fecha = getdate();
        $dia = $fecha["mday"];
        $mes = $fecha["mon"];
        $anio = $fecha["year"];
        $hora = $fecha["hours"];
        $min = $fecha["minutes"];
        $sec = $fecha["seconds"];
        //reasignamos nombre al archivo
        $nombre = $anio . $mes . $dia . $hora . $min . $sec . $nombreArchivo;
        //indicamos la url del archivo
        $ruta = '/var/www/html/php/Galeria/imagenes/'.$nombre .'.'. $extensionFichero;
        //redireccionamos el fichero a nuestra carpeta de imagenes
        //para ello pasamos a la función move_uploaded_file la ruta antigua y la nueva
        move_uploaded_file($_FILES['nombreFichero']['tmp_name'], $ruta);
//inserción de la ruta en la base de datos
        $imagenes->insertarElemento($ruta,($nombre.'.'.$extensionFichero));
    }else{
        $error = 'Fichero no permitido';
    }
}
if(isset($_POST['ver_codigo'])){
  verCodigo(__FILE__);
}else{
    botonVer();
    echo'<br />';
    include('../../ultimaVisitaCookie.php');
}

ob_end_flush();
?>
<a href="../../index.php">Volver</a>
