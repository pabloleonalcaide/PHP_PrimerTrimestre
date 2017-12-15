<?php
/**
* Menu de usuario
* @author Pablo Leon Alcaide
*/
ob_start();
session_start();
if(!$_GET){
    header('Location: ../autentificacion/index.php');
}else{
    $usuario = $_GET['id'];
    $_SESSION['id'] = $usuario;
}

echo'<a href="./ficheros/entregarDocumentos.php?id='.$usuario.'">Entregar Documentos</a><br />
<p></p>
<a href="./ficheros/controlFirma.php?id='.$usuario.'">Firmar Documentos</a><br />
<p></p>
<a href="../leon_alcaide_pablo/autentificacion/index.php">Salir</a>';

?>
