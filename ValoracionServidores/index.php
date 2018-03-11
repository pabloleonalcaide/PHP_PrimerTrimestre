<?php
	session_start();
	ob_start();
    require_once("./Clases/Usuario.php");
    $autentificacion = Usuario::singleton();
    $errorPasswd="";
    $msgError ="";
	  $error = false;
    $errorUsuario = "";
    $usuario = $password = "";

    if (!isset($_SESSION['perfil'])) {
        $_SESSION['perfil'] = "invitado";
    }

    function limpiarCadena($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST['login'])) {
        if (empty($_POST['usuario'])) {
            $errorUsuario = "Rellena este campo.";
            $error = true;
        } else {
            $usuario = limpiarCadena($_POST['usuario']);
        }

        if (empty($_POST['password'])) {
            $errorPasswd = "Rellena este campo.";
            $error = true;
        } else {
            $password = limpiarCadena($_POST['password']);
        }

        if (!$error) {
            $resultado = $autentificacion->login($usuario, $password);
            if (!$resultado) {
                $msgError = "El usuario introducido no existe.";
                $error = true;
            } else {
                $_SESSION['perfil'] = "alumno";
                $_SESSION['alumno'] = $resultado;
                header('Location: ./pages/menu.php');
                }
            }
        }


?>
    <html>
    <head>
      <link type="text/css" rel="stylesheet" href="./style/valoracion.css">
    </head>
    <body>
     <h1>Bienvenido a la Valoración de Servidores</h1>
     <form id="loginForm" class="login" action="./index.php" method="post">
         <div>
             <label>Usuario</label><br>
             <input type="text" name="usuario" />
              <br><span class="error"><?php echo $errorUsuario; ?></span>
         </div>
         <br>
         <div>
             <label>Contraseña</label><br>
             <input class="campo" type="password" name="password"/>
             <br><span class="error"><?php echo $errorPasswd; ?></span> <span class="error"><?php echo $msgError; ?></span>
         </div>
         <br>
         <input type="submit" name="login" value="Confirmar" />
         <br><br><span>¿Aún no te has registrado? </span><a href="./pages/registro.php">Registrarme</a><span></span>

     </form>

</body>
</html>
