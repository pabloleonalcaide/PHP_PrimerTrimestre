<?php
session_start();
ob_start();

if($_SESSION['perfil'] != 'administrador'){
    header('Location: ./autentificacion/index.php');
}

?>

<!-- Menu del administrador - Pablo León Alcaide -->
<h2>Menu de administrador</h2>
<ul>
    <li>
        <a href="./validacion.php">validar usuarios</a>
    </li>
    <li>

    </li>
    <li>
        <a href="./ficheros/clavesFirma.php">generar claves</a>
    </li>
</ul>
<a href="./index.php">Volver</a>
<a href="./autentificacion/salir.php">Desconectar</a>
<?php
ob_end_flush();
?>
