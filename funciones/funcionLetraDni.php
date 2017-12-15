<!DOCTYPE html>
 <html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Letra Dni Pablo León</title> <meta charset="UTF-8" />
        <style>
          .error {color: #FF0000;}
          body{background-color: #fefbd8}
          table{border:1px solid black; border-collapse:collapse;margin:10px;}
          th{border-bottom: 1px solid black;}
          td{margin: 10px; border-right: 1px solid black;}
        </style>
    </head>
    <body>
<?php
      echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
        <label>Introduce un dni Válido</label>
        <input type="text" name="inputDNI"  />
        <input type="submit" name="submit" value="submit" />
      </form>';

    include '../verCodigo.php';
    /*
    * Escribir una función que permita calcular la letra que corresponde a un
    *dni y utilizarla en script que presente un formulario de cálculo de nif
    *
    * @author Pablo Leon Alcaide
    * @version 1.0
    */

      function calcularLetra($numero){
        $arrayLetras= ["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z",
        "S","Q","V","H","L","C","K","E","O"];
        $modulo = $numero % 23;
        return $arrayLetras[$modulo];
      }
      if(isset($_POST['submit'])){
        $number = $_POST['inputDNI'];
        if(is_numeric($number)){
          echo '<p>La letra correspondiente es '.calcularLetra($number).'</p>';
        }else{
          echo 'no has introducido un número';
        }
      }
      //see_code button
      if(isset($_POST['ver_codigo'])){
      verCodigo(__FILE__);
    }

    echo '<div style="clear:both;">';
    botonVer();
    echo '</div>';

    ?>

    </body>
    <!--back to the root -->
    <a href="../index.php">Regresar</a>
</html>
