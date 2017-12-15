<!DOCTYPE html>
 <html lang="es">
    <head>
        <title> Ejercicio Arrays 2</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>Meses del año</h1>
        <h3>Define un array que almacene los meses del año</h3>


    <?php
    include '../verCodigo.php';
    /*
    * Define un array que almacene los meses del año
    * @author Pablo Leon Alcaide
    * @version 1.0
    */
    if(isset($_POST['ver_codigo'])){

      verCodigo(__FILE__);

    }else{
      $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto",
      "Septiembre","Octubre","Noviembre","Diciembre");
      echo '<ol>';
      foreach ($meses as $mes){
        echo '<li>'.$mes.'</li>';
      }
        echo '</ol>';

    botonVer();
    }
    ?>


    </body>
    <a href="../index.php">Regresar</a>
</html>
