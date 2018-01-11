<?php
ob_start();
//Cierra la sesión de login
session_start();
session_unset();
session_destroy();
header('Location: ./index.php');
ob_end_flush();
?>
