

<!--Pablo León Alcaide 2º - DAW -->
<!DOCTYPE html>
 <html lang="es">
    <head>
        <title>Suma recursiva - Pablo León</title> <meta charset="UTF-8" />
        <style>
          .error {color: #FF0000;}
          body{background-color: #fefbd8}
          form label {
              display: inline-block;
              width: 150px;
          }
          form input {
            display: inline-block;
            width: 200px;
            margin-bottom: 10px;
}
        </style>
    </head>
    <body>
      <h2>Introduce un valor, sumaremos sus dígitos</h2>
<?php
      echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
        <label>Valor</label>
        <input type="text" name="numero"  /><br />
        <input type="submit" name="submit" value="Enviar" />
      </form>';

    include '../verCodigo.php';
    /*
    * Escribir una función que permita calcular la letra que corresponde a un
    *dni y utilizarla en script que presente un formulario de cálculo de nif
    *
    * @author Pablo Leon Alcaide
    * @version 1.0
    */

      /**
      * Devuelve la inicial de una palabra introducida
      */
      function sumaRecursiva($numero) {
        if(strlen($numero) > 1) {
          $resultado += sumaRecursiva(array_sum(str_split($numero)));
        } else {
          return 'número: '.$numero.'<br />';
        }
        return 'resultado: '.$resultado;
      }

      if(isset($_POST['submit'])){
        $numero = $_POST['numero'];

        if(EMPTY($numero)){
          echo '<p class="error">
          Introduce algun número por favor
          </p>';
        }else{

          echo sumaRecursiva($numero);
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
