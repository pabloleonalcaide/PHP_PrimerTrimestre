<?php
ob_start();
require('./Imagenes.php');
include('../../verCodigo.php');
$perfil = $_GET['perfil'];
$extensiones = array('jpg','jpeg','gif','png');
$galeria = new Imagenes();
$imagenes = $galeria->get_elementos();
echo '<h2>Galería de Imágenes</h2>';
if (count($galeria) > 0){
    recorreGalería($imagenes);
}
/**
* Muestra todas las imágenes de la galería
*/
function recorreGalería($imagenes){
    //por cada fichero que encontremos en el directorio
    foreach ($imagenes as $imagen) {
        echo "<img src='".$imagen['nombre']."' width=200; height=200;
        style='margin:2px;'>";
    }
}
if(isset($_POST['ver_codigo'])){
  verCodigo(__FILE__);
}else{
    botonVer();
    echo'<br />';
    include('../../ultimaVisitaCookie.php');
}
echo"<br /><a href='../menu.php?perfil=".$perfil."'>Regresar</a>";

ob_end_flush();
?>
