<!DOCTYPE html>
 <html lang="es">
 <meta charset="utf-8" />
    <head>
        <title>Ejercicio Funcion Cuenta Palabras</title> <meta charset="UTF-8" />
        <style>.error {color: #FF0000;} body{background-color: #fefbd8}
        div{margin:0 auto; text-align: center}</style>
    </head>
    <body><div>
        <h1>Función cuenta palabras</h1>
        <h3>Introduce palabras, te diré cuantas hay</h3>
    <?php
    include '../verCodigo.php';
    /*
    * Cuenta palabras
    * @author Pablo Leon Alcaide
    * @version 1.0
    */

    /**Cuenta las palabras de una cadena */
    function cuentaPalabras($cadena){
      $cadena = trim($cadena);//Eliminamos espacios al principio y final
      $count = str_word_count($cadena);
      return $count;
    }
    echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
    <label>Introduce Texto</label><br />
    <textArea rows="6" cols="40" name="cadena"></textArea>
    <input type="submit" name="enviar" value="enviar" />
    </form><br /><br />';

    if(isset($_POST['enviar'])){
      $cadena = $_POST['cadena'];
      $recuento = cuentaPalabras($cadena);
      echo '<h2>Hay '.$recuento.' palabras</h2>';
    }
      //see_code button
      if(isset($_POST['ver_codigo'])){
      verCodigo(__FILE__);
    }

    botonVer();
    ?>
    </div>
    </body>
    <!--back to the root -->
    <a href="../index.php">Regresar</a>
</html>
