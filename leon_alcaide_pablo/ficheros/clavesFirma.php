<?php
/**
* @author Pablo Leon Alcaide
* Generacion de firmas
*/
ob_start();
session_start();
if($_SESSION['perfil'] != 'administrador'){
    header('Location: ../autentificacion/index.php');
}
include_once('../conexion/Usuarios.php');
include_once('../conexion/Claves.php');
$usuarios = new Usuarios();
$claves = new Firmas();
$query = $usuarios->get_usuario();
ob_end_flush();
?>
<h2>Validación de Usuarios</h2>
<?php

if($_POST['buscar']){
    $input = trim($_POST['buscar']);
    $filtro=$usuarios->get_usuarios($input);
    mostrarAgentes($filtro);
}else{
    mostrarAgentes($query);
}

function mostrarAgentes($query){
    if(count($query)==0){
        echo "<p>No hay usuarios</p>";
    }else{
        echo'<form action="./clavesFirma.php" method="post">
        <input type="text" name="search"><input type="submit" name="buscar">
        </form>';
        echo '<table><thead><tr><th>Usuario</th><th>Claves</th></thead>';
        foreach ($query as $value) {
            echo '<tr><td>'.$value[usuario].'</td>
            <td> <a href="./clavesFirma.php?id='.$value[id].'">Descarga</a></td>
            </tr>';
        }
    }echo'</table>';

}
/**
* Genera las claves del usuario y lo valida en la base de datos
*/
if($_GET){
    generarClaves($claves,$_GET['id']);
    $usuarios->validar($_GET['id']);
}

/**
* Genera aleatoriamente las claves del usuario, las almacena en la base de datos y genera un fichero txt
*/
function generarClaves($claves,$id){
    $cadena= '';
    for ($fila=1; $fila < 9; $fila++) {
        $cadena = $cadena."<br />------------------<br />";
        for ($columna=1; $columna < 9; $columna++) {
            $num = rand(1,100);
            $claves->insertarFirma($id,$fila,$columna,$num);
            $cadena= $cadena.$num." | ";
        }
    }
    $archivo = fopen($id.'datos.txt','w') or die("imposible pasar claves");
    $contenido = $cadena;
    fwrite($archivo,$contenido);
    fclose($archivo);
}


ob_end_flush()
?>
<a href="../index.php">Volver</a>
