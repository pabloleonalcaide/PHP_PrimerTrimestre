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

if(isset($_POST['ver_codigo'])){
  verCodigo(__FILE__);
}
/* Declaramos las constantes */
const NUM_FILAS = 10;
const NUM_COLUMNAS = 10;
const NUM_MINAS = 10;
/* Cookie para almacenar las casillas despejadas*/
if(!isset($_COOKIE['despejadas'])){
  $despejadas = 0;
  setcookie('despejadas',$despejadas, time()+3600*24*365*100);
}
/* Si aún no se ha creado el tablero, lo rellenamos*/
if(!isset($_SESSION['tablero'])){
    $_SESSION['tablero'] = array();
    $_SESSION['visible'] = array();
    rellenarTablero();
    minarTablero();
}
/* Si estamos recibiendo una petición por url, entramos al método*/
if(isset($_GET["fila"])){
    clickCasilla($_GET["fila"], $_GET["columna"]);
}

mostrarVisible();

/** Rellena el tablero con 0 (tapado)*/
function rellenarTablero(){
    for ($i=0; $i < NUM_FILAS; $i++) {
        for ($j=0; $j < NUM_COLUMNAS; $j++) {
            $_SESSION["tablero"][$i][$j]=0;
            $_SESSION["visible"][$i][$j]=0;
        }
    }
}
/** Muestra el contenido del tablero*/
function mostrarTablero(){
    for ($i=0; $i < NUM_FILAS; $i++) {
        for ($j=0; $j < NUM_COLUMNAS; $j++) {
            echo $_SESSION["tablero"][$i][$j];
        }
        echo "<br/>";
    }
}
/** Coloca aleatoriamente las minas */
function minarTablero(){

    for ($i=0; $i < NUM_MINAS; $i++) {
        do{
            $fila= mt_rand(0, NUM_FILAS-1);
            $columna = mt_rand(0, NUM_COLUMNAS-1);
        }while($_SESSION["tablero"][$fila][$columna]==9);

        $_SESSION["tablero"][$fila][$columna]=9;
        $filaInicio = max($fila-1,0);
        $columnaInicio = max($columna-1,0);
        $filaUltima = min($fila+1,NUM_FILAS-1);
        $columnaUltima = min($columna+1,NUM_COLUMNAS-1);

        //Añadimos el contador de minas próximas en las casillas vacías
        for ($j=$filaInicio; $j <= $filaUltima ; $j++) {
            for ($k=$columnaInicio; $k <= $columnaUltima; $k++) {
                if($_SESSION["tablero"][$j][$k]!=9)
                    $_SESSION["tablero"][$j][$k]++;
            }
        }
    }
}

function mostrarVisible(){
    echo "<table style='margin:0 auto; border:2px solid black;border-collapse:collapse;'>";
    for ($i=0; $i < NUM_FILAS; $i++) {
      echo '<tr>';
        for ($j=0; $j < NUM_COLUMNAS; $j++) {
            if($_SESSION["visible"][$i][$j]==1){
                $valor=$_SESSION["tablero"][$i][$j];
                echo "<td style='border:1px solid black; width: 20px;''>$valor </td>";
            }else{
                echo "<td style='background-color:gray; border:1px solid black;
                text-decoration: none;width: 20px; text-align:center'>
                  <a style='text-decoration: none;' href=\"buscaminasBeta.php?fila=$i&columna=$j#buscaminas\">0</a></td>";
            }

        }
        echo "</tr>";
    }
    echo "</table>";
}
/**
* Función recursiva que comprueba las casillas
*/
function clickCasilla($fila, $columna){
  //Si la casilla no estaba visible, la destapamos
    if($_SESSION["visible"][$fila][$columna]==0){
        $_SESSION["visible"][$fila][$columna]=1;
        $despejadas = ++$_COOKIE['despejadas'];
        setcookie('despejadas',$despejadas,time()+3600*24*365*100);
        //Si la casilla tiene una mina, se acabó el juego
        if($_SESSION["tablero"][$fila][$columna]==9){
            echo "<p class='error' style='text-align:center;'> Boom! Perdiste</p>";
            //Mostramos las casillas
            for ($i=0; $i < NUM_FILAS; $i++) {
                for ($j=0; $j < NUM_COLUMNAS; $j++) {
                    $_SESSION["visible"][$i][$j]=1;
                }
            }
            destruirSesion();
            ?>
            <div style="text-align:center;">
            <button style="text-align:center" onClick="parent.location = 'buscaminasBeta.php'">Partida nueva </button>
            </div>

          <?php
        }else if($_COOKIE['despejadas']==89){
          echo '<p>GANASTE!!!</p>';
          destruirSesion();

        }
        else if($_SESSION["tablero"][$fila][$columna]==0){
            $filaInicio = max($fila-1,0);
            $columnaInicio = max($columna-1,0);
            $filaUltima = min($fila+1,NUM_FILAS-1);
            $columnaUltima = min($columna+1,NUM_COLUMNAS-1);
            for ($j=$filaInicio; $j <= $filaUltima ; $j++) {
                for ($k=$columnaInicio; $k <= $columnaUltima; $k++) {
                    clickCasilla($j,$k);

                }
            }
        }
    }
}
/** Elimina la sesión actual*/
function destruirSesion(){
  session_start();
  setcookie('despejadas',-1);
  session_destroy();
}
echo'<br />';
botonVer();
echo'<br />
<a href=./index.php style="text-decoration:none;">Volver</a>
  </body>
</html>';


ob_end_flush();
?>
