<?php
/*Fichero de control */
//Si se identifica como administrador, lo enviamos al menu de administrador
if($_POST['user'] == 'admin' && $_POST['pass'] == 'admin'){
    $_SESSION['autentificado'] = 'yes';
    header('Location: ../controller.php?page=menu&perfil=admin');
//Si se identifica como agente, lo enviamos al menu de agente
}else if($_POST['user'] == 'agente' && $_POST['pass'] == 'agente'){
    session_start();
    $_SESSION['autentificado'] = 'yes';
    header('Location: ../controller.php?page=menu&perfil=agente');
}else{
    //si no está identificado, lo mandamos de vuelta
    header('Location: index.php?errorUsuario=yes');
}
?>
