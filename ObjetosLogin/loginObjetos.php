<?php
/**
* Login de Usuarios utilizando objetos (objeto Usuario)
* @author Pablo Leon Alcaide
* @version 1.0
*/
ob_start();
include('Usuario.php');
include('Menu.php');
session_name('usuarios');
session_start();
$_SESSION['usuarios'] = array();
/* Creación de usuarios de prueba y adición al array usuarios*/
$user1 = new Usuario('admin','admin');
$user2 = new Usuario('user','user');
$user3 = new Usuario('pablo','1234');
$_SESSION['usuarios'][] = $user1;
$_SESSION['usuarios'][] = $user2;
$_SESSION['usuarios'][] = $user3;

if(!isset($_POST['registro'])){
?>
<form action="./loginObjetos" method="post">
    <fieldset><legend>Login</legend>
    <label>Usuario </label><input type="text" name="usuario" placeholder="" /><br /><br />
    <label>Password </label><input type="password" name="contrasenia" placeholder="" /><br /><br />
    <input type="submit" name="registro" value="registro" />
    <h6>admin/admin</h6>
    </fieldset>
</form>
<?php
}else{
    $inputUser = $_POST['usuario'];
    $inputPass = $_POST['contrasenia'];
    if(comprobarUsuarios($inputUser,$inputPass)){
        loguearUsuario();
    }else{
        echo 'lo sentimos, no existen coincidencias';
    }
}
/*Salir de la sesión iniciada */
if(isset($_POST['cerrar'])){
    cerrarSesion();
}
/* Comprueba que el usuario exista */
function comprobarUsuarios($iUser,$iPass){
    foreach ($_SESSION['usuarios'] as $usuario) {
            if(($usuario->getUser() == $iUser) && $usuario->getPass() == $iPass){
                $usuario->setLoged(true);
                return true;
            }
    }
    return false;
}
/*Despliega el menu del usuario en concreto */
function loguearUsuario(){
    foreach ($_SESSION['usuarios'] as $usuario) {
        if($usuario->isLoged()){
            $menu = new Menu($usuario);
            echo $menu->createMenu();
        }
    }
    echo '<form action="./loginObjetos.php" method="post">
    <input type="submit" name="cerrar" value="cerrar"></form>';
}
/*Se asegura de cerrar cualquier sesión logueada */
function cerrarSesion(){
    foreach ($_SESSION['usuarios'] as $usuario) {
        if($usuario->isLoged()){
            $usuario->setLoged(false);
            header('./loginObjetos.php');
        }
    }
}
ob_end_flush();
?>
<a href="../index.php">Volver</a>
