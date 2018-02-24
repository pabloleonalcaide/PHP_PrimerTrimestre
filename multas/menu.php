<?php

if($_GET['perfil']=="admin"){
    echo '<h2>Bienvenido Admin</h2>';
    echo '<ul>
    <li>
    <a href="../multas/controller.php?page=validarAgentes">Validar Agentes</a></li>
    <li><a href="../multas/controller.php?page=informeMultas">Informe Multas</a></li>
    </ul>
    ';
}else if($_GET['perfil']=='agente'){
    echo '<h2>Bienvenido Agente</h2>';
    echo '<ul>
    <li><a href="../multas/controller.php?page=gestionMultas">Multas</a></li>
    <li>Mi Cuenta</li>
    </ul>
    ';
}else{
    header('Location:./controller.php?page=autentificacion/salir');
}
?>
<a href="../multas/controller.php">Volver</a>
