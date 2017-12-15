<?php
ob_start();
session_start();
include ('../conexion/Claves.php');
$claves = new Firmas();

if($_GET){
    $id = $_GET['id'];
    $_SESSION['idActual'];
}
$fila = $columna = 0;
$numSecreto = 2017;//generarNumero();

echo'<form action="./controlFirma.php" method="post">
        <span>Identificate, por favor: </span>;<br>
        <br />Fila: '.$fila.'<br />Columna:'.$columna.'<br />
        <label>Número secreto</label><input type="password" name="clave">
        <input type="hidden" name="hidden"  value="'.$id.'"/>
    <br><input type="submit" value="enviar"></form>';
?>
<br><hr><b>Pruebas: </b> número : 2017

<!-- Volver a la raiz -->
<br /><a href="../leon_alcaide_pablo/index.php">Volver</a>

<?
/* Extrae un número aleatorio de la tabla */
function generarNumero(){
    $valores = $claves->getNumero($id);
    $fila = $valores[0];
    $columna = $valores[1];
    $numSecreto = $valores[2];
}
if($_POST['clave'] == $numSecreto){
    $id=$_SESSION['idActual'];
    header('Location: ./firmarDocumentos.php?id='.$_POST['hidden'].'');
}


ob_end_flush();
?>
