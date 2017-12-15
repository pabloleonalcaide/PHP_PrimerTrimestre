<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
    <h1>Autentificación de Usuario</h1>
    <form action="./control.php" method="post">
        <?php
            echo '<span>Identificate, por favor: </span>';
        
        ?>
        <br><label>Usuario</label><input type="text" name="user">
        <br><label>Contraseña</label><input type="password" name="pass">
        <br><input type="submit" value="enviar">
    </form>
    <br><hr><b>Administrador: </b> usuario: admin || pass: admin
    <br><hr><b>Usuario: </b> usuario: usuario || pass: usuario
<!-- Volver a la raiz -->
    <br /><a href="../../index.php">Volver</a>

</body>
</html>
