<?php
/**
 * @author Pablo Leon Alcaide
 * @version 1.0
 */
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesión cerrada</title>
</head>
<body>
    <h2>La sesión se ha cerrado con éxito</h2>
    <a href="acceso.php">Iniciar sesión</a>
</body>
</html>
