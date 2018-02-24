<?php
/**
* Ejercicio Buscaminas
* @author Pablo Leon
* @version 1.0
*/
ob_start();
session_start();
include './verCodigo.php';
include './ultimaVisitaCookie.php';

?>
<html>
  <head>
        <title>Buscaminas</title>
        <style>.error {color: #FF0000;} body{background-color: #fefbd8}
                h1{text-align:center;}  a:visited{color:blue;}
        </style>
        <meta charset="UTF-8" />
  </head>
  <body>
    <h1>Buscaminas - Pablo León</h1>

<?
if(isset($_POST['ver_codigo'])){ verCodigo(__FILE__); }

$max = 9;
$error = false;
$columnas = 10;
$filas = 10;
$numMinas = 10;

if (isset($_SESSION["tablero"])) {
    $_SESSION["registro"][$_GET["fila"]][$_GET["columna"]] = 1;
}else{
  crearTablero();
}

    $contador;
    echo "<table style='margin:0 auto; border:2px solid black;'>";
    for ($i = 0; $i < $columnas; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $filas; $j++) {
                $contador = 0;
                for ($k = -1; $k < 2; $k++){
                    for ($m = -1; $m < 2; $m++){
                        if ($_SESSION["tablero"][$i+$k][$j+$m]==9){
                         $contador++;
                        }
                    }
                }
                echo "<td style=' width: 20px; text-align:center;'>$contador</td>";
            }
    echo "</tr>";
} echo "</table>";
echo'<br />';
botonVer();
echo'<br />';

/**
* Genero el tablero
*/
function crearTablero(){
  while ($numMinas > 0) {
      for ($i = 0; $i < $columnas; $i++) {
          for ($j = 0; $j < $filas; $j++) {
              if ($campo[$i][$j] == 9) {

              } else {
                  $campo[$i][$j] = rand(0, $max);
                  $_SESSION["registro"][$i][$j] = 0;
                  if ($campo[$i][$j] == 9) {
                      $numMinas--;
                  }
                  if ($numMinas == 0) {
                      $max = 8;
                  }
              }
          }
      }
  }$_SESSION["tablero"] = $campo;
}//fin pintarTablero()

ob_end_flush();
?>
