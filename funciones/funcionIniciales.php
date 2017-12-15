<!--Pablo León Alcaide 2º - DAW -->
<!DOCTYPE html>
 <html lang="es">
    <head>
        <title>Iniciales - Pablo León</title> <meta charset="UTF-8" />
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
      <h2>Introduce tu nombre y apellidos, te devolveré las iniciales</h2>
<?php
      echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
        <label>Nombre</label>
        <input type="text" name="name"  /><br />
        <label>Primer Apellido</label>
        <input type="text" name="subname1"  /><br />
        <label>Segundo Apellido</label>
        <input type="text" name="subname2"  /><br />
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
      function generarInicial($cadena){
        return strtoupper(substr($cadena,0,1));
      }

      if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $subname1 = $_POST['subname1'];
        $subname2 = $_POST['subname2'];
        //Si es un número o contiene caracteres numéricos
        if(is_numeric($name)){
          echo 'Introduciste valores numéricos!';
          //Si deja algún campo sin rellenar
        }elseif(EMPTY($name)||EMPTY($subname1)||EMPTY($subname2)){
          echo '<p class="error">
          Introduce todos los campos por favor
          </p>';
        }else{
          $iniciales = generarInicial($name).'.'.generarInicial($subname1).'.'.generarInicial($subname2);
          echo '<div style="text-align:center;">
          Iniciales: '.$iniciales.'</div>';
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
