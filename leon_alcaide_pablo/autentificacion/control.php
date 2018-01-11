<?php

/**
* Capa de control del login  En caso de que el usuario no esté registrado o validado, no puede acceder
* HE HECHO LAS PRUEBAS CON UN USUARIO  user:pablo pass:pablo puesto que al generar la contraseña con md5
* era más engorroso loguearse todo el tiempo
* @author Pablo Leon Alcaide
*/
ob_start();
session_start();
require_once ('../conexion/Usuarios.php');
if(!$_SESSION['perfil']){
    $_SESSION['perfil'] = 'anonimo';
}

$usuarios = new Usuarios();
$query = $usuarios->get_usuario();
$user = $_POST['user'];
$pass = $_POST['pass'];
$perfil ="anonimo";

if($user == 'admin' && $pass = 'admin'){
    $perfil='administrador';
    $_SESSION['perfil'] = 'administrador';
}else{
    foreach($query as $row){
        if($row['usuario'] == $user && $row['password']== $pass && $row['estado']=='activo'){
            $_SESSION['idUsuario']= $row['id'];
            $perfil='usuario';
            $_SESSION['perfil'] = 'usuario';
       }
    }
}
if($perfil == 'anonimo'){
    header('Location: ../conexion/registro.php');
}else{
    if ($perfil== 'administrador'){
        header('Location: ../menuAdmin.php');
    }else{
        header('Location: ../accesoUsuario.php?id='.$_SESSION['idUsuario']);
    }
}

ob_end_flush();
?>
