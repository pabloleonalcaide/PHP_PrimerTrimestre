<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Saliste</title>
</head>
<body>
    <h3>Sesion Cerrada</h3>
    <a href="index.php">Volver a autentificarte</a>
</body>
</html>
