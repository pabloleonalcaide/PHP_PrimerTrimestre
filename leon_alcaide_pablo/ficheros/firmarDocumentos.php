<?php
/**
* Firma de documentos por parte del usuario
* @author pablo leon alcaide
*/
ob_start();
require('../conexion/Documentos.php');
$id = $_SESSION['idActual'] =  $_GET['id'];
$documentos = new Documentos();
$query = $documentos->get_pendientes($id);
?>
<h2>Firma de ficheros</h2>
<?php
mostrarDocumentos($query);
function mostrarDocumentos($query){
    if(count($query)==0){
        echo "<p>No hay ficheros por firmar</p>";
    }else{
        echo '<form action="./firmarDocumentos.php" method="post">
        <table><thead><tr><th>Documento</th><th>Estado</th><th>Fecha</th><th>Accion</th></thead>';
        foreach ($query as $value) {
            echo '<tr><td>'.$value[fichero].'</td><td>'.$value[estado].'</td><td>'.$value[fechaFirma].'</td>';
            if($value[estado] == 'Pendiente'){
                echo'<td><input type="checkbox" name="select[]" value="' . $value[id] . '" ></td>';
            }
            echo'</tr>';
        }
        echo '</table><br><br><input type="submit" name="validar" value=Validar></form>';
        }
}
if(isset($_POST['validar'])){
    foreach($_POST['select'] as $selected){
        $documentos->validar($selected);
    }
    $id = $_SESSION['idActual'];
    header("Location: ./firmarDocumentos.php?id=$id");
}

ob_end_flush()
?>
<a href="../leon_alcaide_pablo/index.php">Volver</a>
