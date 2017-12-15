<?php
//Cierra la sesión de login
session_start();
session_unset();
session_destroy();
?>
    <h3>Sesion Cerrada</h3>
    <a href="./controller.php?page=indexGaleria">Volver a autentificarte</a>
