<?php
session_start();
ob_start();

if($_SESSION['perfil'] == 'administrador'){
    header('Location: ../menuAdmin.php');
}elseif ($_SESSION['perfil'] == 'usuario'){
    header('Location: ../accesoUsuario.php');
}
?>
<!-- Index del Login - Pablo Leon Alcaide -->
    <h1>Autentificación de Usuario</h1>
    <h2>Aún no estás registrado o validado</h2>

    <form action="./control.php" method="post">
        <?php
        if ($_GET['errorUsuario'] == 'yes') {
            echo '<span><b>Los datos no son correctos</b></span>';
        } else {
            echo '<span>Identificate, por favor: </span>';
        }
        ?>
        <br><label>Usuario</label><input type="text" name="user">
        <br><label>Contraseña</label><input type="password" name="pass">
        <br><input type="submit" value="enviar">
    </form>
    <br><hr><b>Administrador: </b> usuario: admin || pass: admin
    <br/><a href="../leon_alcaide_pablo/index.php">Volver</a>
<?php
ob_end_flush();
 ?>
