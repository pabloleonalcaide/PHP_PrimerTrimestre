<!--Pablo León Alcaide 2º - DAW -->
<!DOCTYPE html>
 <html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Contraseña Segura - Pablo León</title> <meta charset="UTF-8" />
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
      <h2>Introduce una contraseña y te diré si es segura</h2>
<?php
      echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
        <label>Contraseña</label>
        <input type="password" name="pass"  /><br />
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
      function comprobarPassword($cadena){
        //busca coincidencia con el patrón general de una contraseña robusta
        return preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $cadena);
      }

      if(isset($_POST['submit'])){
        $password = $_POST['pass'];

        if(EMPTY($password)){
          echo '<p class="error">
          Introduce algun caracter por favor
          </p>';
        }else{

          if (comprobarPassword($password)) {
            echo "su password es seguro.";
          } else {
              echo "su password no es seguro.";
}
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
