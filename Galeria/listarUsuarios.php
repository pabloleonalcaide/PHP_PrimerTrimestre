<?php
ob_start();
require('./conexion/Usuarios.php');
include('../verCodigo.php');
$usuarios = new Usuarios();
$listado = $usuarios->get_usuarios();
?>
<table><tr><th>id</th><th>nombre</th><th>eliminar</th></tr>
<?
    foreach($listado as $usuario){
        if($usuario['perfil']!= 'administrador'){
        echo'<tr><td>'.$usuario["id"].'</td><td>'.$usuario["nombre"].'</td>';
        echo'<td><a href="listarUsuarios.php?id='.$usuario["id"].'">borrar</a></td></tr>';
        }
    }
?>
</table>
<?
if($_GET){
    $usuarios->borrarUsuario($_GET['id']);
    header('Location: listarUsuarios.php');
}
if(isset($_POST['ver_codigo'])){
  verCodigo(__FILE__);
}else{
    botonVer();
    echo'<br />';
    include('../ultimaVisitaCookie.php');
}
echo"<br /><a href='./menu.php?perfil=administrador'>Regresar</a>";
?>
