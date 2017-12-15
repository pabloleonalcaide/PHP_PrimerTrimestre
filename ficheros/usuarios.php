<?php
ob_start();
 /**
 * @author Pablo Leon Alcaide
 * @version 1.0
 */
/* Abstracción de funciones por separación de contenido */

    include('../ultimaVisitaCookie.php');
    include( "./funciones.php");
    include( '../verCodigo.php');
    //include('../header.php');
   date_default_timezone_set('Europe/Madrid');
   /* Declaración de variables */
    $fecha = date('d') . date('m') . date('Y');
    $hora = date('G') . date('i') . date('s');
    $fechaActual = $fecha.$hora;
    $directorio = "/var/www/html/php/ficheros/";
    $prefijo = "bd";
    $nombreBD = "2DAW";
    $fichero = $extension = $nombre = $lenghtName = $longSinExtension = $ficheroLect =
    $sufijo = $password = $ficheroEscrit = $iniciales = $usuario = $error = "";
    $fCargado = true;

    if (isset($_POST['enviar']) or (isset($_POST['enviarSH']))) {
        $fichero = $directorio . basename($_FILES['archivo']['name']);
        $extension = pathinfo($fichero, PATHINFO_EXTENSION);
        $lenghtName = strlen($_FILES['archivo']['name']);
        $longSinExtension = $lenghtName - 4;
        $nombre = substr($_FILES['archivo']['name'], 0, $longSinExtension) .
        "_$fechaActual.$extension";
        $fichero = $directorio . $nombre;

        $password = limpiarDatos($_POST['password']);

        if (empty($_FILES['archivo']['tmp_name'])) {
            $error = "Selecciona un archivo antes";
            $fCargado = false;
        }else if (file_exists($fichero)) {
            $error = "El archivo indicado ya existe";
            $fCargado = false;
        }else if ($extension != "txt") {
            $error = "El formato de archivo debe ser  tipo *.txt";
            $fCargado = false;
        }else if ($_FILES['archivo']['size'] > 800000) {
            $error = "Lo siento, el archivo no puede sobrepasar los 800000 bytes";
            $fCargado = false;
        }else{
            $error = "";
            $fCargado = true;
        }
    }
?>
    <h3>Generar Usuarios</h3>
    <div style="margin: 0 auto; text-align: left; width:50%; background-color:#f5f5dc">

    <form method="post" action="usuarios.php" enctype="multipart/form-data">
        <fieldset><legend> SQL generator </legend>
            <label>Archivo</label>
            <input type="file" name="archivo" /><br>

            <label>Password</label>
            <input type="text" name="password" value="usuario" /><br>
            <span><?php echo $error; ?></span>
            <input type="submit" name="enviar" value="Generar SQL" />    </fieldset>

    </form></div>
    <div style="margin: 0 auto; text-align: left; width:50%; background-color:#f5f5dc">

    <form method="post" action="usuarios.php" enctype="multipart/form-data">
        <fieldset><legend> SH generator </legend>
            <label>Archivo</label>
            <input type="file" name="archivo" /><br>
            <label>Password</label>
            <input type="text" name="password" value="usuario" /><br>
            <span><?php echo $error; ?></span>
            <input type="submit" name="enviarSH" value="Generar SH" /> </fieldset>

    </form></div>

<?php
    if (isset($_POST['enviar']) and $fCargado) {
        echo "<div style='border: 1px solid black; display:inline-block;'>";
        crearUsuariosSQL();
        echo "</div>";
    }
    if (isset($_POST['enviarSH']) and $fCargado){
        echo "<div style='border: 1px solid black; display:inline-block;'>";
        crearUsuariosLinux();
        echo "</div>";
    }

    if(isset($_POST['ver_codigo'])){verCodigo(__FILE__); }
    echo '<div style="clear:both;">';
    botonVer();
    echo '</div><a href="../index.php">Volver</a>';

    function crearUsuariosSQL(){
        $ficheroLect = fopen($directorio . $_FILES['archivo']['name'], 'r+') or exit("Imposible abrir el archivo");
        $ficheroGuardar = "script_".$fechaActual.".sql";
        $ficheroEscrit = fopen($directorio . $ficheroGuardar, 'w+') or exit('Imposible guardar el archivo');

        $contador = 0;
        while (!feof($ficheroLect)) {

                $iniciales = obtenerIniciales(fgets($ficheroLect));
                if ($iniciales != "") {
                    if($contador<8){
                        //nada
                    }else{
                    $nombreBD = $prefijo . $iniciales . $sufijo;
                    $usuario = $iniciales . $sufijo;
                    //Utilizamos la constante End of line para el salto de línea
                    fputs($ficheroEscrit, "CREATE USER '".$usuario."'@'localhost' IDENTIFIED BY '".
                    $password."';".PHP_EOL);
                    fputs($ficheroEscrit, "CREATE DATABASE ".$nombreBD.";".PHP_EOL);
                    fputs($ficheroEscrit, "GRANT ALL PRIVILEGES ON ".$nombreBD.".* TO '".
                    $usuario."'@'localhost' IDENTIFIED BY '".$password."';".PHP_EOL);

                }
            }
            $contador++;
        }
        fclose($ficheroLect);
        fclose($ficheroEscrit);
        echo'<a href="descarga.php?archivo='.$ficheroGuardar.'">Descargar sql</a>';
    }
    function crearUsuariosLinux(){
        $ficheroLect = fopen($directorio . $_FILES['archivo']['name'], 'r+') or exit("Imposible abrir el archivo");
        $ficheroGuardar = "script_".$fechaActual.".sh";
        $ficheroEscrit = fopen($directorio . $ficheroGuardar, 'w+') or exit('Imposible guardar el archivo');
        $password = "usuario";
        $contador = 0;
        fputs($ficheroEscrit, "#!/bin/sh".PHP_EOL);
        while (!feof($ficheroLect)) {
                $iniciales = obtenerIniciales(fgets($ficheroLect));
                if ($iniciales != "") {
                    if($contador<8){
                        //nada
                    }else{

                    $usuario = $iniciales;
                    //Utilizamos la constante End of line para el salto de línea
                    fputs($ficheroEscrit, "useradd ".$iniciales.PHP_EOL);
                    fputs($ficheroEscrit, $iniciales.":".$password." | chpasswd".PHP_EOL);
                    fputs($ficheroEscrit,"#".PHP_EOL);
                }
            }
            $contador++;
        }
        fclose($ficheroLect);
        fclose($ficheroEscrit);
        echo'<a href="descarga.php?archivo='.$ficheroGuardar.'">Descargar</a>';
    }
ob_end_flush();
?>
