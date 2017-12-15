<!DOCTYPE html>
 <html lang="es">
    <head>
        <title> Formulario Calendario</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>Formulario Meses</h1>
        <h3>Despliega un calendario en función del més y año seleccionado</h3>
    <?php
    include './verCodigo.php';
    /*
    * Muestra un calendario en función del mes y año seleccionado
    * @author Pablo Leon Alcaide
    * @version 1.0
    */
    if(isset($_POST['enviar'])){
        $today = date("j");
        $month= $_POST["meses"];
        $year= $_POST["anno"];

      function isHoliday($day, $month) //comprueba si el día es festivo
       {
           if($day == 24 && $month == 10){
               return True;
           }else if ($day == 24 && $month == 12){
               return True;
           }else if($day == 8 && $month == 9){
               return True;
           }else if($day == 1 && $month == 11){
               return True;
           }else if($day == 31 && $month == 12){
               return True;
           }else{
               return False;
           }

       }
       // Devuelve el primer día (en qué día de la semana empieza)

       $firstDayWeek=date("w",mktime(0,0,0,$month,1,$year))+7;

       // Devuelve el último día de ese més.

       $lastDayMonth=date("d",(mktime(0,0,0,$month+1,1,$year)-1));

       $last_cell=$firstDayWeek+$lastDayMonth; // calcula cual es la última celda.

       echo "<table style=' border-collapse: collapse;'>
           <tr>
               <th style='border: 2px solid teal;'>Lunes</th>
               <th style='border: 2px solid teal;'>Martes</th>
               <th style='border: 2px solid teal;'>Miércoles</th>
               <th style='border: 2px solid teal;'>Jueves</th>
               <th style='border: 2px solid teal;'>Viernes</th>
               <th style='border: 2px solid teal;'>Sábado</th>
               <th style='border: 2px solid teal;'>Domingo</th>
           </tr>

           <tr>";


           for($i=1;$i<=42;$i++){ //recorre cada celda del calendario

           if($i==$firstDayWeek){

               // se asigna la prosición del primer día
               $day=1;

           }

           if($i<$firstDayWeek || $i>=$last_cell){ // deja en blanco las celdas que no corresponden a días del mes
               echo "<td>&nbsp;</td>";

           }else{

                   if ($i%7==0 || isHoliday($day,$month)){
                       echo "<td style='background-color:red;border: 2px solid black;'>$day</td>";    // si corresponde con domingo, lo pintamos de rojo
                   }else{
                       echo "<td style='border: 2px solid black;'>$day</td>"; //si es un día normal, simplemente aparece el número
                   }

               $day++;

           }


           if($i%7==0) //tras el último día de la semana, salta a la siguiente fila

           {

               echo "</tr><tr>\n";

           }

       }

       echo '</table>';

    }else{
        if(isset($_POST['ver_codigo'])){
          verCodigo(__FILE__);
        }
    echo'<form action="formularioCalendario.php" method="post">
      <label>Mes</label><select name="meses">
        <option value="1">Enero</option><option value="2">Febrero</option>
        <option value="3">Marzo</option><option value="4">Abril</option>
        <option value="5">Mayo</option><option value="6">Junio</option>
        <option value="7">Julio</option><option value="8">Agosto</option>
        <option value="9">Septiembre</option><option value="10">Octubre</option>
        <option value="11">Noviembre</option><option value="12">Diciembre</option>
      </select>
      <label>Año</label><select name="anno">
      <option value="2017">2017</option>
      <option value="2016">2016</option>
      <option value="2015">2015</option>
      <option value="2014">2014</option>
      </select>
      <input type="submit" name="enviar" value="enviar" />
    </form><br /><br />';

    botonVer();
    }
    ?>


    </body>
    <a href="../php">Regresar</a>
</html>
