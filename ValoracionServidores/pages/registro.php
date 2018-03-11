<?php
session_start();
ob_start();
require_once("../Clases/Usuario.php");
$usuarios = Usuario::singleton();
require_once("../Clases/Servidor.php");
$servidor = Servidor::singleton();

$error = false;
$errorExisteUser = $errUsuario = $errCorreo= $errPasswd = $errPasswd2 = $errUrl = "";
$usuario = $password= $password2= $url= $email = "";
?>
<head>
    <link type="text/css" rel="stylesheet" href="../style/valoracion.css">
</head>
<h1> Registro de Usuario </h1>
<?php
if (isset($_POST['registro'])) {

if (empty($_POST['usuario'])) {
$errUsuario = "Rellena este campo";
$error = true;
} else {
$usuario = limpiarCadena($_POST['usuario']);
}

if (empty($_POST['password'])) {
  $errPasswd = "Rellena este campo";
  $error = true;
} else {
  $password = limpiarCadena($_POST['password']);
}
if ($_POST['password2'] != $_POST['password']) {
  $errPasswd2 = "Las contraseñas no coinciden";
  $error = true;
} else {
  $password2 = limpiarCadena($_POST['password2']);
}
if (empty($_POST['email'])) {
  $errCorreo = "Rellena este campo";
  $error = true;
} else {
  $email = limpiarCadena($_POST['email']);
}
if (empty($_POST['url'])) {
  $errUrl = "Rellena este campo";
  $error = true;
} else {
  $url = limpiarCadena($_POST['url']);
}

if (!$error) {
  $usuarios->insertarUsuario($usuario, $password, $email);
    $id = $usuarios->getId($usuario)[0]['id'];
    if($id != null){
      $servidor->insertarServidor($id,$url);
      header("Location:../indexValoraciones.php");
    }else{
      $msgError ="No se pudo agregar servidor";
    }
}else{
  $errorExisteUser = "El usuario ya existe";
}
}

function limpiarCadena($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo '<form id="formRegistro" method="post" accept-charset="utf-8" action="./registro.php">
<label>Usuario:</label><input type="text" name="usuario" value='.$usuario.'><span>'.$errUsuario.'</span><br>
<label>Contraseña:</label><input type="password" name="password"><span>'.$errPasswd.'</span><br>
<label>Repetir contraseña:</label><input type="password" name="password2"><span>'.$errPasswd2.'</span><br>
<label>Correo:</label><input type="text" name="email"><span>'.$errCorreo.'</span><br>
<label>url:</label><input type="text" name="url" value='.$url.'><span>'.$errUrl.'</span><br>
<p>'.$errorExisteUser.'</p>
<input type="submit" name="registro" value="aceptar">
</form><a  id="volver" href="../index.php">Volver</a>';
?>
