<?php
ob_start();
session_start();
require_once("../Clases/Usuario.php");
$usuario = Usuario::singleton();
require_once("../Clases/Servidor.php");
$servidor = Servidor::singleton();
$servidores = $servidor->getServidores();
if(!isset($_SESSION['puntuaciones'])){
  $_SESSION['puntuaciones'] = array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
}

if($_SESSION['perfil'] == "invitado" || !isset($_SESSION['perfil'])){
  header('Location: ../indexValoraciones.php');
}
?>
<head>
  <link type="text/css" rel="stylesheet" href="../style/valoracion.css">
</head>
<h1>Vota los servidores</h1>

<?php
if(isset($_POST['votar'])){
  $servidorid = $_POST['serverId'];
  $votacion = $_POST['nota'];
  $usuarioid = $_SESSION['alumno'][0]['id'];

  $servidor->votarServidor($usuarioid,$servidorid,$votacion);
  $clave = array_search($votacion, $_SESSION['puntuaciones']);
  unset($_SESSION['puntuaciones'][$clave]);
}
if(count($servidores)==0){
  echo "No hay servidores para votar<br><br>";
}
foreach ($servidores as $value) {
  $puntuacion = $servidor->getPuntuacionServer($value['id'])[0]['total'];
  $nombre = $usuario->getUsuario($value['id_usuario'])[0]['usuario'];
  echo
  '<div style= "background-color: #303F9F; margin: 10px auto; padding: 10px;
  text-align: center; width: 50%;"><h4>'.$nombre.'</h4>
  <p><a href='.$value['url'].'>Ver servidor</a></p>
  <p><b>Puntuación: </b>'.$puntuacion.'</p>
  <form action="./votar.php" method="post">
  <input type="hidden" name="serverId" value="'.$value['id'].'"></input>
  <input type="hidden" name="iduser" value="'.$value['id_usuario'].'"></input>
  <label>Valoración</label><br><select name="nota">';
  foreach ($_SESSION['puntuaciones'] as $key => $value) {
    echo '<option value="'.$value.'">'.$value.'</option>';
  }
  echo '</select><input type="submit" name="votar" value="Valorar"/></form></div>';
}
?>
<a  id="volver" href="./menu.php">Volver</a><br><br>
<a href="../salir.php">Cerrar Sesión</a>
<?php
  ob_end_flush();
?>
