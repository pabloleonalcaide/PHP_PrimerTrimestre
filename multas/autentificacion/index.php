
    <h1>Autentificación de Usuario</h1>
    <form action="../multas/autentificacion/control.php" method="post">
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
    <br /><b>Agente: </b> usuario: agente || pass: agente

<!-- Volver a la raiz -->
    <br /><a href="../multas/controller.php">Volver</a>
