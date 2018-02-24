<?php
session_start();
ob_start();
require_once ('./Agentes.php');
$RegistroAgentes = new Agentes();
$agentes = $RegistroAgentes->getNoValidados();

mostrarAgentes($agentes);

function mostrarAgentes($agentes){
    if(count($agentes)==0){
        echo "<p>No hay agentes por validar</p>";

    }else if(!isset($_POST['validarTodos'])){
        echo '<form action="../multas/controller.php?page=validarAgentes" method="post">
        <table><thead><tr><th>Usuario</th><th>Nombre</th><th>validado</th></thead>
        <input type="submit" name="validarTodos" value="Validar todos">';
        foreach ($agentes as $value) {

            echo '<tr><td>'.$value[usuario].'</td><td>'.$value[nombre].'</td><td>'.$value[validado].'</td>
            <td> <input type="checkbox" name="select[]" value="' . $value[id] . '" ></td>
            </tr>';
        }
        echo '</table><br><br><input type="submit" name="validar" value=Validar></form>';
        }

}
if(isset($_POST['validar'])){
    foreach($_POST['select'] as $selected){
        $RegistroAgentes->validar($selected);
    }
    header("Location: ../multas/controller.php?page=validarAgentes");

}else if(isset($_POST['validarTodos'])){
    echo '<form action="../multas/controller.php?page=validarAgentes" method="post"><table><thead><tr><th>Usuario</th><th>Nombre
    </th><th>validado</th></thead><input type="submit" name="validaTodos" value=Marcar Todos>';
    foreach ($agentes as $value) {
        echo '<tr><td>'.$value[usuario].'</td><td>'.$value[nombre].'</td><td>'.$value['validado'].'</td>
        <td> <input type="checkbox" name="select[]" value="' . $value[id] . '" checked ></td>
        </tr>';
    }
    echo '</table><br><br><input type="submit" name="validar" value=Validar></form>';

}
?>
<a href="../multas/controller.php">Volver</a>
