<!DOCTYPE html>
 <html lang="es">
    <head>
        <title> Ejercicio Arrays 3</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>Tablero Barcos</h1>
        <h3>Almacena en un array un tablero de barcos (hundir la flota)</h3>
    <?php
    include '../verCodigo.php';
    /*
    * Define un array que almacene un tablero de barcos
    * @author Pablo Leon Alcaide
    * @version 1.0
    */
    if(isset($_POST['ver_codigo'])){

      verCodigo(__FILE__);

    }else{

      echo '<table style="border: 1px solid black;">';
      $row = array(
        array(" ","A","B","C","D","F"),// Cabecera
        array("border","water","water","boat","water","water"),//Cada Fila del tablero
        array("border","water","water","boat","water","water"),
        array("border","boat","water","water","water","water"),
        array("border","boat","water","water","water","water"),
        array("border","boat","water","water","water","water"),
        array("border","water","water","water","water","water")
      );
      $i = 1; //Numero de Fila
      foreach ($row as $col){
        echo '<tr style="height:40px;width:40px; text-align:center;">';
        foreach ($col as $value){
          if ($value == "border"){
          echo '<td style="border:1px solid black;">'.$i.'</td>';
          $i = $i+1;
          }else{
            if ($value == "water"){
            echo '<td style="border:1px solid black;
            background-color:lightblue;">'.$value.'</td>';
          }elseif ($value == "boat"){
              echo '<td style="border:1px solid black; background-color:gray;">'.$value.'</td>';
            }else{
              echo '<td style="border:1px solid black;">'.$value.'</td>';
            }
          }
        }
        echo '</tr>';
      }
      echo '</table>';
      echo '<p>Blue: Water</p><p>Gray: Boat</p><p>Red: Touched boat</p>';
    botonVer();
    }
    ?>
    </body>
    <a href="../index.php">Regresar</a>
</html>
