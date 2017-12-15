<?php
session_start(); // Se inicia la sesion

if($_SESSION['autentificado'] != 'yes'){
    header("Location: ./indexAuth.php");
    exit();
}
?>
