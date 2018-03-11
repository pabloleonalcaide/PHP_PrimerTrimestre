<?php
ob_start();
session_start();
require('../Clases/Usuario.php');
require('../Clases/Servidor.php');

?>
<?php
if($_SESSION['perfil'] == "invitado" || !isset($_SESSION['perfil'])){
  header('Location: ../index.php');
}
?>
<head>
  <link type="text/css" rel="stylesheet" href="../style/valoracion.css">
</head>
<h1>Vista de tu servidor</h1>
<?php
mostrarServidor();

?><a  id="volver" href="./menu.php">Volver</a><br>
<br><a href="../salir.php">Cerrar Sesión</a>
<?php

function mostrarServidor(){
    $idusuario = $_SESSION['alumno'][0]['id'];
    $servidor = Servidor::singleton();
    $miServer = $servidor->getServidorUsuario($idusuario);
    $puntuacion = $servidor->getPuntuacionServer($miServer[0]['id'])[0]['total'];
    if(!$puntuacion){
      $puntuacion = 0;
    }
    echo '<div class="card">
        <p><b>Dirección:</b> '.$miServer[0]['url'].'</p>
        <p><b>Detalles: </b>'.$miServer[0]['descripcion'].'</p>
        <p><b>Puntuacion Total:</b> '.$puntuacion.'</p>
    ';


    echo '</div>';
}
ob_end_flush();
 ?>
