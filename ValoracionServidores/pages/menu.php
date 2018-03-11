<?php
ob_start();
session_start();
?>
<?php
if($_SESSION['perfil'] == "invitado" || !isset($_SESSION['perfil'])){
  header('Location: ../index.php');
}
?>
<head>
  <link type="text/css" rel="stylesheet" href="../style/valoracion.css">
</head>
<header></header>
<h1>Bienvenido <?php echo $_SESSION['alumno'][0]['usuario'] ?></h1>
<main>
  <ul id="opciones">
    <li><a href="http://192.168.12.129">Ver Servidores</a></li>
    <li><a href="./votar.php">Votar Servidores</a></li>
    <li><a href="./verServidor.php">Ver mi Servidor</a></li>
  </ul>
</main>
<?php


?>
<a href="../salir.php">Cerrar Sesión</a>
<?php
ob_end_flush();
 ?>
