<?php
ob_start();
session_start();
include('../verCodigo.php');
if(!$_GET){
    header('Location: ../autentificacion/index.php');
}else{
    if($_GET['perfil'] == 'administrador'){
        mostrarAdmin();
    }else if($_GET['perfil'] =='invitado'){
        mostrarUsuario();
    }else{
        echo '<p>Este usuario no existe</p>';
    }
}
?>
<a href="../autentificacion/index.php">Salir</a>

<?php
function mostrarAdmin(){
    echo'<h2>Menu de Administrador</h2><ul>
    <li><a href="./imagenes/insertarImagenes.php">Insertar Imágenes</a></li>
    <li><a href="./imagenes/verImagenes.php?perfil=administrador">Ver Imágenes</a></li>
    <li><a href="./listarUsuarios.php">Listar Usuarios</a></li>
    </ul>
    ';
}

function mostrarUsuario(){
    echo'<h2>Menu de Usuario</h2><ul>
    <li><a href="./imagenes/verImagenes.php?perfil=invitado">Ver Imágenes</a></li>
    <li><a href="./modificarPassword.php">Modificar Password</a></li>
    </ul>';
}
if(isset($_POST['ver_codigo'])){
  verCodigo(__FILE__);
}else{
    botonVer();
    echo'<br />';
    include('../ultimaVisitaCookie.php');
}
?>
