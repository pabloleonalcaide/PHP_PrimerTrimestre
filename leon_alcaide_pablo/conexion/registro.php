<?php
/**
* @author pablo leon alcaide
* Registro de los usuarios no almacenados en la base de datos
*/
session_start();
ob_start();
include ('Usuarios.php');
$usuarios = new Usuarios();

if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = "";
    $_SESSION['nombre'] = "";
}
$user = $password1 = $password2 = $name = $errorMsg = "";

if ($_SESSION['usuario']!= '' || $_SESSION['nombre']!= ''){
        $user = $_SESSION['usuario'];
        $name = $_SESSION['nombre'];
        $errorMsg ="Hay errores";
}

echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
?>
        <fieldset><legend>Registro</legend>
        <label> Usuario: </label><input type="text" name="usuario" value="<?echo $user ?>" /><br />
        <label> Nombre: </label><input type="text" name="nombre" /><br />
        <label> Contraseña: </label><input type="text" name="password" /><br />
        <label> Email: </label><input type="text"name="email" value="" /><br />
        <input type="submit" name="validar" value="validar" />
        </fieldset><span><? echo $errorMsg ?></span>
    </form>

<?php
    if(isset($_POST['validar'])){
        $user = limpiar($_POST['usuario']);
        $name = limpiar($_POST['nombre']);
        $email = limpiar($_POST['email']);
        $password = limpiar($_POST['password']);
        $password = md5($password);
        //comprobamos que ningún campo esté vacío y que la contraseña y su repetición coincidan
        if(!empty($user) && !empty($name) && !empty($password)){
            $usuarios->insertarUsuario($name,$email,$user,$password);
            mkdir("/var/www/html/php/leon_alcaide_pablo/directorios/$user", 0777);
            $_SESSION['usuario'] = "";
            $_SESSION['nombre'] = "";
        }else{ //Si no está correcto, volvemos atrás
            $_SESSION['usuario'] = $user;
            $_SESSION['nombre'] = $name;
        }
        header('Location: ../index.php');
    }
    //limpia los datos
    function limpiar($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>
<a href="../index.php">Volver</a>
