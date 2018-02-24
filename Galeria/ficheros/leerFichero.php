<?php
/**
* @author Pablo Leon
* Manejo de un fichero de texto
*/
ob_start();
session_start();
include './verCodigo.php';
?>
<form action="leerFichero.php" method="post">
<input type="text"  name="text" /><input type="submit" name="buscar" value="buscar" />
</form>
<?
if($_POST['buscar']){
    buscarCoincidencia($_POST['text']);
}
function buscarCoincidencia($patron){
    $coincidencia = false;
    $nombre = $patron;
    $file =fopen("usuarios.txt","r") or exit("Unable to open file");
    $contador=0;
    while (!feof($file)) {
      //Si símplemente hicieramos echo de fgetc en el while imprimiría todos
      //los caracteres pero lo pondría todo en línea
      $linea=fgets($file);
      //para romper la línea en un array -> explode(separador,cadena)
      if($contador <1){  //nos aseguramos de limpiar la cabecera
      }else{
          if($nombre == trim($linea)){
              $coincidencia = true;
          }
    }
      $contador++;
    }
    fclose($file);
    if($coincidencia){
        echo 'hay coincidencia';
    }else{
        echo 'no hay coincidencia';
    }
}
if(isset($_POST['ver_codigo'])){
  verCodigo(__FILE__);
}else{
    botonVer();
    echo'<br />';
    include('../ultimaVisitaCookie.php');
    ob_end_flush();
}
?>
<a href="../../index.php">Volver</a>
