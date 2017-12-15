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
      <meta charset="utf-8" />
        <title>Buscaminas</title>
        <style>.error {color: #FF0000;} body{background-color: #fefbd8}
                h1{text-align:center;}  a:visited{color:blue;}
        </style>
        <meta charset="UTF-8" />
  </head>
  <body>
    <h1>Buscaminas - Pablo León</h1>

<?php
if(isset($_POST['ver_codigo'])){ verCodigo(__FILE__); }

$max = 9;
$error = false;
//inicio variables modificables
$columnas = 10;
$filas = 10;
$numMinas = 10;
if(!isset($_COOKIE['despejadas'])){
  $despejadas = 0;
  setcookie('despejadas',$despejadas);}

else{
    $despejadas = ++$_COOKIE['despejadas'];
    setcookie('despejadas',$despejadas,time()+3600*24*365*100);
  }
if (isset($_SESSION["tablero"])) {
    $_SESSION["registro"][$_GET["fila"]][$_GET["columna"]] = 1;
    if ($_SESSION["tablero"][$_GET["fila"]][$_GET["columna"]] == 9) {
        $error = true;
    }
} else {
    while ($numMinas > 0) {
        for ($i = 0; $i < $columnas; $i++) {
            for ($j = 0; $j < $filas; $j++) {
                if ($campo[$i][$j] == 9) {
                } else {
                    $campo[$i][$j] = rand(0, $max); //le doy un valor
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
}
if ($error == true ||$_COOKIE['despejadas']==90 ) {
    $mensaje = "";
    if($error == true){
      $mensaje = 'Boom!!!';
    }else{
      $mensaje = 'Ganaste!';
    }
    echo "<h2 class='error' style='text-align:center;'>".$mensaje."</h2>";
    destruirSesion();
    ?>
    <div style="text-align:center;">
    <button style="text-align:center" onClick="parent.location = 'buscaminasSesiones.php'">Partida nueva </button>
  </div>

<?php

}else{
    $contador;
    echo "<table style='margin:0 auto; border:2px solid black;'>";
    for ($i = 0; $i < $columnas; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $filas; $j++) {

            if ($_SESSION["registro"][$i][$j] == 1){
                $contador = 0;
                for ($k = -1; $k < 2; $k++){
                    for ($m = -1; $m < 2; $m++){
                        if ($_SESSION["tablero"][$i+$k][$j+$m]==9){
                            $contador++;
                        }
                  }
                }
                echo "<td style='background-color:lightgreen; width: 20px; text-align:center;'>$contador</td>";
           } else {
                echo "<td style='background-color:brown; border:1px solid black;text-decoration: none;
                width: 20px; text-align:center'>
                <a style='text-decoration:none;' href='?fila=" . $i . "&columna=" . $j . "'>?</a></td>";
            }

    }echo "</tr>";
  }
} echo "</table>";
echo'<br />';
botonVer();
echo'<br />';
/* Destruye la sesión */
function destruirSesion(){
  session_start();
  setcookie('despejadas',-1);
  session_destroy();
}
ob_end_flush();
?>
<a href="./index.php">Volver</a>
