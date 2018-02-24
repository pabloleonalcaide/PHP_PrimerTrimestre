<?php
/**
* El index lanza automaticamente a la autentificación del usuario
* @author Pablo Leon Alcaide
*/
ob_start();
header('Location: ./autentificacion/index.php');
ob_end_flush();
?>
