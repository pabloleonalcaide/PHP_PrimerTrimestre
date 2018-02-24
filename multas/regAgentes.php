<?
session_start();
ob_start();
/**
* Registro de agentes en la base de datos
*/
include ('Agentes.php');
$agentes = new Agentes();

//si aún no habíamoscreado las variables de sesión, las creamos
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = "";
    $_SESSION['nombre'] = "";
}
$user = $password1 = $password2 = $name = $errorMsg = "";

//si ya habíamos almacenado datos en la variable de sesión, volvemos a cargarlos
if ($_SESSION['usuario']!= '' || $_SESSION['nombre']!= ''){
        $user = $_SESSION['usuario'];
        $name = $_SESSION['nombre'];
        $errorMsg ="Hay errores";
}

echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
?>
        <fieldset><legend>Registro</legend>
        <label> Usuario: </label><input type="text" name="usuario" value="<?echo $user ?>" /><br />
        <label> Contraseña: </label><input type="password" name="contrasena1" /><br />
        <label> Repetir contraseña: </label><input type="password" name="contrasena2" /><br />
        <label> Nombre: </label><input type="text"name="nombre" value="<?echo $name ?>" /><br />
        <input type="submit" name="validar" value="validar" />
        </fieldset><span><? echo $errorMsg ?></span>
    </form>

<?
//Cuando pulse para validar agente
    if(isset($_POST['validar'])){
        $user = limpiar($_POST['usuario']);
        $name = limpiar($_POST['nombre']);
        $password1 = limpiar($_POST['contrasena1']);
        $password2 = limpiar($_POST['contrasena2']);
        //comprobamos que ningún campo esté vacío y que la contraseña y su repetición coincidan
        if(!empty($user) && !empty($name) && !empty($password1) &&coincidirPsw($password1,$password2)){
            $agentes->insertarAgente($user,$password1,$name);
            $_SESSION['usuario'] = "";
            $_SESSION['nombre'] = "";
        }else{ //Si no está correcto, volvemos atrás
            $_SESSION['usuario'] = $user;
            $_SESSION['nombre'] = $name;

        }
        header('Location: ./regAgentes.php');
    }
    //comprueba si coincide la contraseña y la repetición
    function coincidirPsw($pass1,$pass2){
        return $pass1 == $pass2;
    }
    //limpia los datos
    function limpiar($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>
<a href="../multas/controller.php">Volver</a>
