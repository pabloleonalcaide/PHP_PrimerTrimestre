<?php
session_start(); // Se inicia la sesion
if($_SESSION['autentificado'] != 'yes'){
    header("Location: ./index.php");
    exit();
}
?>
