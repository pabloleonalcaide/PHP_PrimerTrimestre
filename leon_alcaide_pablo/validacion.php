<?php
/**
* @author Pablo Leon
* Validacion de usuarios por parte del administrador
*/
ob_start();
require('./conexion/Usuarios.php');
$usuarios = new Usuarios();
$query = $usuarios->get_novalidados();
ob_end_flush();
?>
<h2>Validación de Usuarios</h2>
<?
mostrarAgentes($query);
function mostrarAgentes($query){
    if(count($query)==0){
        echo "<p>No hay usuarios por validar</p>";

    }else if(!isset($_POST['validarTodos'])){
        echo '<form action="./validacion.php" method="post">
        <table><thead><tr><th>Usuario</th><th>Nombre</th><th>validado</th></thead>
        <input type="submit" name="validarTodos" value="Validar todos">';
        foreach ($query as $value) {

            echo '<tr><td>'.$value[usuario].'</td><td>'.$value[nombre].'</td><td>'.$value[estado].'</td>
            <td> <input type="checkbox" name="select[]" value="' . $value[id] . '" ></td>
            </tr>';
        }
        echo '</table><br><br><input type="submit" name="validar" value=Validar></form>';
        }

}
if(isset($_POST['validar'])){
    foreach($_POST['select'] as $selected){
        $usuarios->validar($selected);
    }
    header("Location: ../validacion.php");

}else if(isset($_POST['validarTodos'])){
    echo '<form action=".validacion.php" method="post"><table><thead><tr><th>Usuario</th><th>Nombre
    </th><th>validado</th></thead><input type="submit" name="validaTodos" value=Marcar Todos>';
    foreach ($query as $value) {
        echo '<tr><td>'.$value[usuario].'</td><td>'.$value[nombre].'</td><td>'.$value['estado'].'</td>
        <td> <input type="checkbox" name="select[]" value="' . $value[id] . '" checked ></td>
        </tr>';
    }
    echo '</table><br><br><input type="submit" name="validar" value=Validar></form>';

}
ob_end_flush()
?>
<a href="../leon_alcaide_pablo/index.php">Volver</a>
