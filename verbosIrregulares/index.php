 <?php
 /**
 * @author Pablo Leon Alcaide
 * @version 2.0
 */
header('Content-Type: text/html; charset=UTF-8');
include "arrayVerbosIrregulares.php";
include '../verCodigo.php';
?>
<head>
    <meta charset="utf-8">
    <style>
        section{border: 3px solid #757575;text-align: center;}
        td,th{border: 1px solid #252525; color: #000}
        .error{color:red;}
        h2{text-align: center; background: #757575; color: #f4f4f4;}
        table{margin: 10px auto; border-collapse:collapse;}
    </style>
</head>
<h2>Verbos Irregulares - Pablo León</h2>
<section >
    <?php
    $verbos = cargarArrays();
    // Variables
    $errorVerbos = $numError = $fondo = $inputValue = $tiempoVerbo = "";  
    $verbosRandom = array();
    $tiemposRandom = array(); 
    $hayError = $espacios = $aciertos = 0; 

    if (isset($_POST["generarJuego"])) {

        if ($_POST["dificultad"] == "facil") {
            $espacios = 1;
        } else if ($_POST['dificultad'] == "medio") {
            $espacios = 2;
        } else {
            $espacios = 3;
        }

        if ($_POST["numeroVerbos"] <= 0 or $_POST["numeroVerbos"] > count($verbos)) { 
            $numError = "Número inválido";
            $hayError = 1;
        } else {
            for ($i = 0; $i < $_POST["numeroVerbos"]; $i++) {
                for ($j = 0; $j < $espacios; $j++) {
                    do {
                        $aleatorioTiempo = rand(0, 3);  
                    } while (in_array($aleatorioTiempo, $tiemposRandom));
                    $tiemposRandom[$j] = $aleatorioTiempo; 
                }

                do {
                    $aleatorioVerbo = rand(0, count($verbos) - 1); 
                } while (in_array($aleatorioVerbo, $verbosRandom));  
                $verbosRandom[$aleatorioVerbo] = $tiemposRandom;  

            }
        }
    }

    echo "<form method='post' action=''>";

    if ((!isset($_GET["id"]) and !isset($_POST["generarJuego"]) and !isset($_POST["enviarJuego"]) and !isset($_POST["comprobar"])) or $hayError == 1) {
        echo "<label>Dificultad: </label> <br>
            <select name='dificultad'>
                <option value='facil'>Fácil</option>
                <option value='medio'>Medio</option>
                <option value='dificil'>Difí­cil</option>
            </select><br> Número de verbos para Jugar: <br>
            <input type='number' name='numeroVerbos'><span class='error'>* <br>$numError</span>
            <br><input type='submit' name='generarJuego' value='Aceptar'>";
    }

    if (isset($_POST["enviarJuego"]) or isset($_POST["comprobar"])) {
        $verbosRandom = $_POST["valores"];
    }

    if ((isset($_POST["enviarJuego"]) or isset($_POST["generarJuego"]) or isset($_POST["comprobar"])) and $hayError == 0) {

        echo "<table><tr><th>Infinitivo</th><th>Pasado</th><th>Participio</th>
            <th>Traducción</th><th>Speaker</th></tr>";

        foreach ($verbosRandom as $key => $value) {
            echo "<tr>";
            for ($cell = 0; $cell < 5; $cell++) { 
                if (isset($_POST["enviarJuego"])) {
                    switch ($cell) { 
                        case 0: $tiempoVerbo = "infinitivo";
                            break;
                        case 1: $tiempoVerbo = "Pasado";
                            break;
                        case 2: $tiempoVerbo = "participio";
                            break;
                        default: $tiempoVerbo = "traduccion";
                            break;
                    }

                    $existe = array_key_exists($cell, $value); 


                    if ($existe) { 
                        $valorUsuario = $value[$cell]; 
                        //comprobación de aciertos        
                        if (strtolower($valorUsuario) == strtolower($verbos[$key][$tiempoVerbo])) { 
                            $fondo = "rgba(50, 255, 50, 0.75);"; 
                            $aciertos++;    
                        } else {   
                            $fondo = "rgba(255, 50, 50, 0.75);"; 
                        }

                        $inputValue = $valorUsuario; 
                    }
                } else if (isset($_POST["comprobar"])) {  
                    switch ($cell) {   
                        case 0: $tiempoVerbo = "infinitivo";
                            break;
                        case 1: $tiempoVerbo = "Pasado";
                            break;
                        case 2: $tiempoVerbo = "participio";
                            break;
                        case 3: $tiempoVerbo = "traduccion";
                            break;
                    }

                    $existe = array_key_exists($cell, $value); 
                    $inputValue = $verbos[$key][$tiempoVerbo];
                } else { 
                    $existe = in_array($cell, $value);
                }

                if ($existe) { 
                    echo "<td><input type='text' name='valores[$key][$cell]' value='$inputValue' style='background: $fondo; '></td>";

                } else {  

                    switch ($cell) {   
                        case 0:
                            echo "<td>" . $verbos[$key]["infinitivo"] . "</td>";
                            break;
                        case 1:
                            echo "<td>" . $verbos[$key]["Pasado"] . "</td>";
                            break;
                        case 2:
                            echo "<td>" . $verbos[$key]["participio"] . "</td>";
                            break;

                        case 3:
                            echo "<td>" . $verbos[$key]["traduccion"] . "</td>";
                            break;
                        default:
                            $cadena = $verbos[$key]["infinitivo"] .",". $verbos[$key]["Pasado"].",".$verbos[$key]["participio"];
                            echo "<td > <b><a href='#' onclick=speaker('$cadena');> Listen! </a><b></td>";
                            break;
                    }
                }
            }
            echo "</tr>";
        }
        echo "</table>";

        if (isset($_POST["enviarJuego"])) {
            echo ">> Número de aciertos: " . $aciertos . "<< <br>";
        }

        echo "<input type='submit' name='enviarJuego' value='Validar'><input type='submit' name='comprobar' value='Solución'>
            <input type='submit' name='volver' value='Volver'></form";
    }
    ?>

</section>

<script src="http://code.responsivevoice.org/responsivevoice.js"></script>
<script>
    let speaker = (msg)=>{
        responsiveVoice.speak(msg, "UK English Male", {volume: 100});
    }
</script>
<?php
if(isset($_POST['ver_codigo'])){
  verCodigo(__FILE__);
}
    botonVer();

?>
<hr><a href="../">Regresar</a>