<?php
/*Fichero de control */
if($_POST['user'] == 'admin' && $_POST['pass'] == 'admin'){ 
    session_start();
    $_SESSION['autentificado'] = 'yes';
    header('Location: aplicacion.php');
}else{
    header('Location: index.php?errorUsuario=si');
}
?>
