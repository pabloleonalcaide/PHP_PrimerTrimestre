<!DOCTYPE html>
 <html lang="es">
    <head>
        <title>Ejercicio Suma Formulario</title> <meta charset="UTF-8" />
        <style>.error {color: #FF0000;} body{background-color: #fefbd8}fieldset{width:50%; margin:0 auto;}</style>
    </head>
    <body>
        <h1>Formulario Suma</h1>
        <h3>Indica cuantos números deseas sumar, introdúcelos y obten tu resultado</h3>
    <?php
    include './verCodigo.php';
    /*
    * Adding operations with form
    * @author Pablo Leon Alcaide
    * @version 1.0
    */
    //check that we haven't pushed any button yet
    if((!isset($_POST['enviar']) && !isset($_POST['resultado']))){
      echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
      <select name="count">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      <input type="submit" name="enviar" value="enviar" />
      </form><br /><br />';
    }
      //see_code button
      if(isset($_POST['ver_codigo'])){
      verCodigo(__FILE__);
    }
    //check that we push in the first button (count of numbers)
    else if(!isset($_POST['resultado']) && isset($_POST['enviar'])){
      echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
      $cantidadNumeros = $_POST["count"];
      for($i=1;$i<=$cantidadNumeros;$i++){
        echo '<input type="text" name="num'.$i.'" /><br />';
      }
      //we need to save the count in these hidden input
      echo '<input type="hidden" name="cantidad" value='.$cantidadNumeros.'/>';
      echo '<input type="submit" name="resultado" value="resultado" /><br />
      <input type="reset" value="limpiar" /></form><br />';
      }
      //check that we push in the second button (result)
      else if(isset($_POST["resultado"]) && !isset($_POST["enviar"])){
        $suma=0;
        for($i=1;$i<=$_POST["cantidad"];$i++){
          $suma +=$_POST['num'.$i];
        }
        echo '<strong>El resultado es: </strong>'.$suma;
      }

    botonVer();
    ?>

    </body>
    <!--back to the root -->
    <a href="../php">Regresar</a>
</html>
