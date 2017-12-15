<?php
ob_start();
include '../verCodigo.php';
/**
* @author Pablo Leon Alcaide
* @version 1.0
* Diseña e implementa una galería de fotos con las imágenes guardadas en un directorio.
* Permite la subida de imágenes con un formulario.
*/

$extensiones = array('jpg','jpeg','gif','png');
$error = "";
echo
"<html><head><Title>Galeria</Title><meta charset='utf-8' /></head><body>
        <form name='galeria' method='post' action='./galeriaImagenes.php'
enctype='multipart/form-data'><p style='color:red;'>$error</p>
  <input type='file' name='nombreFichero' accept='image/*'/><br />
  <input type='submit' name='enviar' value='Enviar' />
</form>";
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
    $ruta = '../php/ficheros/galeria/'.$nombre .'.'. $extensionFichero;
    //redireccionamos el fichero a nuestra carpeta de imagenes
    //para ello pasamos a la función move_uploaded_file la ruta antigua y la nueva
    move_uploaded_file($_FILES['nombreFichero']['tmp_name'], $ruta);
    }else{
        $error = 'Fichero no permitido';
}
}
//con scandir(directorio) creamos un array con todos los elementos del directorio
$galeria = scandir("./galeria/");
if (count($galeria) > 0){
    recorreGalería($galeria, $extensiones);
}else{
    echo '<p>No hay imágenes en el directorio </p>';
}
/**
* Muestra todas las imágenes de la galería
*/
function recorreGalería($directorio, $extensiones){
    echo '<h2>Galería de Imágenes</h2>';
    //por cada fichero que encontremos en el directorio
    foreach ($directorio as $imagen) {
        $nombre = explode('.', $imagen);
        $extension = end($nombre);
        $extension = strtolower($extension);
        if (in_array($extension, $extensiones))
        //si la extensión del fichero es válida (una imagen) la añadimos
            echo "<img class='prueba' src='./ficheros/galeria/$imagen' width=200; height=200;
            style='margin:2px;'>";
    }
}
if(isset($_POST['ver_codigo'])){
  verCodigo(__FILE__);
}else{
    botonVer();
    echo'<br />';
    include('../ultimaVisitaCookie.php');
}
?>
<a href="../index.php">Volver</a>
</body>
</html>
