<?php

/**
* @author Pablo Leon Alcaide
* @version 1.0
*/
session_start();
try {
    include('../verCodigo.php');
    include ('Contactos.php');
    $contactos = new Contactos();
    $_SESSION['agenda'] = $contactos->get_contactos();
} catch (Exception $e) {
    echo "No ha sido posible acceder a la base de datos";
}


 ?>

 <style>
    *{ color:#F4F4F4;}
    input{color:#222;}
    fieldset{width: 50%; margin: 0 auto;}
    .table,td,td,th {border:1px solid black; border-collapse:collapse;
    background-color: #D4D4D4; padding:2px; margin:0 auto;color: #222;}
    .delete{background-color:red;}
    .edit{background-color: green;}
 </style>


 <form action="../php/main.php?page=agendaBaseDatos/indexAgenda" method="post">
    <fieldset style="text-align:center">
        <legend> Agenda de Contactos</legend>
        <label>Localizar contactos: </label>
        <input type="search" placeholder="search" name="search"/>
        <input type="submit" value="buscar" name="buscar" /><br />
        <input type="submit" value="añadir contacto" name="anadir" />
    </fieldset>
 </form>
<?

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $condicion = $_POST['search'];

    if(isset($_POST['buscar'])){
        $pattern = $_POST['search'];
        mostrarResultados($contactos->buscarContactos($pattern));
    }
        // Si pulsa añadir, se redirecciona al formulario de inserción
        else if (isset($_POST['anadir'])){
            header('Location: ../php/main.php?page=agendaBaseDatos/insert');
        }

        //Si no hay peticion, mostramos toda la agenda
}else{
        mostrarResultados($_SESSION['agenda']);
    }

function mostrarResultados($array){
    echo '<table class="table"><th></th><th></th>
    <th>Orden</th><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Teléfono</th><th>Email</th>';
    foreach($array as $value){
        echo'<tr>';
        ?>
    <input type="hidden" value="<?$value['id']?>" name="id">
    <td class="edit"><a href="./agendaBaseDatos/edit.php?id=<?echo $value['id']?>">Editar</a></td>
    <td class="delete"><a href="./agendaBaseDatos/delete.php?id=<?echo $value['id']?>">Eliminar</a> </td>
    <?
        foreach($value as $column){
            echo'<td>'.$column.'</td>';
        }
    }
    echo '</table>';
}
if(isset($_POST['ver_codigo'])){
  verCodigo(__FILE__);
}else{
    botonVer();
    echo'<br />';
    include('../ultimaVisitaCookie.php');
    ob_end_flush();
}
?>
