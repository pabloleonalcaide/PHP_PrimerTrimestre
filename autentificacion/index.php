<?php
ob_start();
include('../verCodigo.php');
 ?>
<!DOCTYPE html>
<!--Autentificación de usuarios-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autentificacion</title>
    <style>
        .error{color = red; }
    </style>
</head>
<body>
    <h1>Autentificación de Usuario</h1>
    <form action="control.php" method="post">
           <span>Identificate, por favor: </span>;
        <br><label>Usuario</label><input type="text" name="user">
        <br><label>Contraseña</label><input type="password" name="pass">
        <br><input type="submit" value="enviar">
    </form>
    <br><br><hr>
    chuleta -->
    <br>usuario: admin
    <br>pass: admin<br />
    <?
    botonVer();
    ?>
    <a href="../index.php">Volver</a>
</body>
</html>
<?
include('../ultimaVisitaCookie.php');
ob_end_flush();
?>
