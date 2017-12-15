<?php
ob_start();
    /**
	 * @author Pablo Leon Alcaide
     * @version 1.0
     */
    session_start();
    include("./functions.php");
    include("../verCodigo.php");
    /* Al inicio, cargamos las variables de sesión por defecto*/
    if (!isset($_SESSION['usuario'])) {
        $_SESSION['usuario'] = "";
        $_SESSION['perfil'] = "invitado";
        $_SESSION['autentificado'] = false;
        $_SESSION['listaUsuarios'][]= array("usuario" => "admin", "password" => "admin", "perfil" => "administrador");
        $_SESSION['listaUsuarios'][]= array("usuario" => "user", "password" => "user", "perfil" => "usuario");
    }

    $usuario = $password = $mensaje = $msjErrorUser = $msjErrorPass = "";
    $hayErrorUser = $hayErrorPass = false;

    /* Si no es un perfil invitado, redireccionamos*/
    if ($_SESSION['perfil'] != "invitado") {
        $name = $_SESSION['usuario'];
        $perfil = identificar($name);
        header("Location: sesionAbierta.php?nombre=$name&perfil=$perfil");
        }

     if (isset($_POST['enviar'])) {
         $usuario = limpiarDatos($_POST['usuario']);
         $password = limpiarDatos($_POST['password']);

         if (empty($usuario)) {
             $msjErrorUser = "El campo no puede estar vacío";
             $hayErrorUser = true;
         }else{
             $msjErrorUser = "";
             $hayErrorUser = false;
         }

         if (empty($password)) {
             $msjErrorPass= "El campo no puede estar vacío";
             $hayErrorUser = true;
         }else{
             $msjErrorPass = "";
             $hayErrorPass = false;
         }
         /* En caso de error en el login, volvemos atrás*/
         if (!$hayErrorUser and !$hayErrorPass) {
             $_SESSION['autentificado'] = validar($usuario, $password);

             if ($_SESSION['autentificado']) {
                 $_SESSION['usuario'] = $usuario;
                 $_SESSION['perfil'] = identificar($usuario);
                 header("Location:acceso.php");
             }else {
                 $_SESSION['usuario'] = "";
                 $_SESSION['perfil'] = "invitado";
                 $mensaje = "<p>Los datos no son correctos</p>";
             }
         }
     }
 ?>
     <form id="pass" class="login" action="acceso.php" method="post">
         <br>
             <label>Usuario</label>
             <input type="text" name="usuario" placeholder="admin" />

         <span class="error"><?php echo $msjErrorUser; ?></span>
         <br>
             <label>Password</label>
             <input class="campo" type="password" name="password" placeholder="admin" />

         <span class="error"><?php echo $msjErrorPass; ?></span><br>
         <input type="submit" name="enviar" value="Acceder" />
     </form>

 <?php
    echo $mensaje;
    echo "<a href='../index.php'>Volver</a>";
    echo '<h6>Usuarios: admin:admin   user:user</h6>';

    if(isset($_POST['ver_codigo'])){
      verCodigo(__FILE__);
    }else{
        botonVer();
        echo'<br />';
        include('../ultimaVisitaCookie.php');
    }
  ?>
<a href="../index.php">Volver</a>
