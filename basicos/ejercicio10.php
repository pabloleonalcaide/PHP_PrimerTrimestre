<!DOCTYPE html>
<!-- Calendario.-->
 <html lang="es">
	<head>
		<title> Ejercicio 10 </title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<h3>Mostrando Calendario </h3>
		<h2>Pablo León Alcaide</h2>
	<?php
	/*
	* @author Pablo Leon Alcaide
	* @version 1.0
	*/
	include '../verCodigo.php';
	if(isset($_POST['ver_codigo'])){

    verCodigo(__FILE__);

	}else{

       $today = date("j");
        $month=date("n");
        $year=date("Y");

        function isHoliday($day, $month) //comprueba si el día es festivo
        {
            if($day == 24 && $month == 10){
                return True;
            }else if ($day == 24 && $month == 12){
                return True;
            }if($day == 8 && $month == 9){
                return True;
            }if($day == 1 && $month == 11){
                return True;
            }if($day == 31 && $month == 12){
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
                if($day==$today)
                    echo "<td style='background-color:lightgreen;border: 2px solid black;'>$day</td>";  // si corresponde con hoy, lo pintamos de verde

                else
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

		botonVer();
	}

	?>
	</body>
</html>
