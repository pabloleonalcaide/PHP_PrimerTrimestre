<?php
ob_start();
require_once ('./Multas.php');
$multas = new Multas();
?>
<form action="../multas/controller.php?page=informeMultas" method="post">
    <input type="number" name="year" value="2017" max="2017" min="2000"/>
    <input type="submit" name="solicitar" />
</form>
<?
if(isset($_POST['solicitar'])){
    $solicitud = $_POST['year'];
    header('Location: ../multas/controller.php?page=informeMultas&year='.$solicitud.'');
}
if(isset($_GET['year'])){
    $fecha = $_GET['year'];
    $resultados = $multas->mostrarInforme($fecha);
    $cantidadTotal =$multas->importeAnual($fecha);

    echo '<table><th>Mes</th><th>Total</th>';

    foreach($resultados as $fila){
        echo '<tr>';
        foreach($fila as $valor){
            echo'<td>'.$valor.'</td>';
        }
        echo'</tr>';
    }
    echo '</table>';
    ?>
    <p>Total Anual: <? echo calcularTotal($cantidadTotal) ?></p>

<?
}
function calcularTotal($cantidadTotal){
    $valor= 0;
    foreach($cantidadTotal as $value){
        foreach($value as $campo){
            $valor +=$campo;
        }
    }
    return $valor;
}
?>
<a href="../multas/controller.php">Volver</a>
