<?php
ob_start();
$id = $_GET['id'];
$_SESSION['idActual'] = $id;
/**
* @author Pablo Leon Alcaide
* @version 1.0
*/
include ('../conexion/Documentos.php');
$error = "";
$documentos = new Documentos();
echo "<form name='galeria' method='post' action='entregarDocumentos.php'
enctype='multipart/form-data'><p style='color:red;'>$error</p>
  <input type='file' name='nombreFichero' /><br />
  <label>Descripcion</label><input type='text' name='descripcion' /><br />
  <input type='hidden' name='hidden' value=".$id." />
  <input type='submit' name='enviar' value='Enviar' />
  </form>";
 echo"<a href='../accesoUsuario.php?id=".$_SESSION['idActual']."'>Regresar</a>";
if (isset($_POST['enviar'])) {
    $id = $_POST['hidden'];
    echo $id;
    //coge el fichero subido
    $ficheroSubido = $_FILES['nombreFichero']['name'];
    //separa la extensión del nombre
    $nombre = explode('.', $ficheroSubido);
    //recoge la extensión (último elemento del array generado)
    $extensionFichero = end($nombre);
    $extensionFichero = strtolower($extensionFichero);
    if ($_FILES['nombreFichero']['size']<2000000) {
        $fecha = getdate();
        $dia = $fecha["mday"];
        $mes = $fecha["mon"];
        $anio = $fecha["year"];
        $hora = $fecha["hours"];
        $min = $fecha["minutes"];

        $nombre = $anio . $mes . $dia . $hora . $min  . $nombreArchivo;
        $ruta = '/var/www/html/php/leon_alcaide_pablo/ficheros/'.$nombre .'.'. $extensionFichero;
        $cadenaFecha = '2017-01-01';
        $date=date("Y-m-d",strtotime($cadenaFecha));
        move_uploaded_file($_FILES['nombreFichero']['tmp_name'], $ruta);
        $documentos->insertarFichero($id,$_POST['descripcion'],$ruta,$date);
    }else{
        $error = 'Fichero no permitido';
    }
}

ob_end_flush();
?>
