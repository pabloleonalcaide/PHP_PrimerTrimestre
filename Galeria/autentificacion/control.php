<?php
ob_start();
require_once ('../conexion/Usuarios.php');

$usuarios = new Usuarios();
$query = $usuarios->get_usuarios();
$user = $_POST['user'];
$pass = $_POST['pass'];
$perfil ="anonimo";
foreach($query as $row){
    if($row['nombre'] == $user && $row['passwd']== $pass){
       $perfil = $row['perfil'];
   }
}
header('Location: ../menu.php?perfil='.$perfil);
ob_end_flush();
?>
