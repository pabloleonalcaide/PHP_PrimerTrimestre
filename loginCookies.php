<?php
ob_start();
include './verCodigo.php';
/**
* @author Pablo Leon Alcaide
* @version 1.0
*
*  Formulario de login que permita al usuario recordar los datos introducidos
*/

  if($_COOKIE['user']!=NULL){
    header("Location: ./autentificado.php");
  }
  if(!isset($_POST['login'])){
  echo '<br />aun no estás registrado, identificate<br />';
  echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
  <label>Usuario</label><input type="text" name="usuario" /><br />
  <label>Clave</label><input type="text" name="clave" /><br />
  </select> <input type="submit" value="login" name="login"  />
  </form>';
}elseif(isset($_POST['login']) && !isset($_POST['borrar'])){
      $user = $_POST["usuario"];
      $pass = $_POST["clave"];
  setcookie('user',$user,time()+360);
  setcookie('pass',$pass,time()+360);
  header("Location: ./autentificado.php");
}
if(isset($_POST['ver_codigo'])){
verCodigo(__FILE__);
}


echo '<div style="clear:both;">';
botonVer();
echo '</div>';
ob_end_flush();
?>
<br />    <a href="../php">Regresar</a>
