    <?php
    /*
    * Queremos almacenar nombre, apellidos y grupo de los alumnos del departamento
    * de informática para generar de manera automática el nombre de usuario de
    * acceso a los sistemas informáticos. Diseña e implementa un array para guardar
    * esta información y posteriormente generar un array con el nombre de los
    * usuarios, teniendo en cuenta que éste se forma: caa+pp+ss+n
    * caa: Indica ciclo y año.
    * pp: Indica las 2 primeras letras del primer apellido.
    * ss: Indica las 2 primeras letras del segundo apellido.
    * n: Indica la 1ª letra del nombre.

    * @author Pablo Leon Alcaide
    * @version 1.0
    */
    //Almacenamos los alumnos en un array
    $arrayAlumnos[] = array("n" =>"Pablo","pp"=>"Leon","ss" =>"Alcaide","caa" => "daw17");
    $arrayAlumnos[] = array("n" =>"Nieves","pp"=>"Borrero","ss" =>"Barea","caa" => "daw17");
    $arrayAlumnos[] = array("n" =>"Javier","pp"=>"Ponferrada","ss" =>"Lopez","caa" => "daw17");
    $arrayAlumnos[] = array("n" =>"Alberto","pp"=>"Perez","ss" =>"Cano","caa" => "daw17");
    $arrayAlumnos[] = array("n" =>"Rafael","pp"=>"Mellado","ss" =>"Jimenez","caa" => "daw17");
    $arrayAlumnos[] = array("n" =>"Mario","pp"=>"Ferrer","ss" =>"Nieto","caa" => "daw17");
    $arrayAlumnos[] = array("n" =>"Victoriano","pp"=>"Sevillano","ss" =>"Vega","caa" => "daw17");
    $arrayAlumnos[] = array("n" =>"Dario","pp"=>"Fernandez","ss" =>"Osuna","caa" => "daw17");
    $arrayAlumnos[] = array("n" =>"Isabel","pp"=>"Gomez","ss" =>"Palomeque","caa" => "daw17");
    $arrayAlumnos[] = array("n" =>"Jesús","pp"=>"Requena","ss" =>"Perez","caa" => "daw17");

    //Mostramos los datos del array
    echo '<p> Pablo León Alcaide    </p>';
    echo "<h1>Almacenando alumnos y sus usuarios en array</h1>";
    echo '<div style="float:left;"><h3>Información de los alumnos</h3>
    <table style="border:1px solid black; border-collapse:collapse;margin:10px;">';
    echo "<thead style='border-bottom: 1px solid black;'><th>Nombre</th><th>Apellido 1</th>";
    echo "<th>Apellido 2</th><th>Grupo</th></thead>";
    foreach ($arrayAlumnos as $alumno => $valor) {
       echo "<tr>";
      foreach ($valor as $info) {
         echo "<td>" . $info . "</td>";
      }
       echo "</tr>";
    }
    echo "</table></div>";
    echo "<div style='float:left;'><h3>Usuarios de los alumnos</h3>";
    //Extraemos las dos primeras letras de nombre y apellidos, así como el curso y año
    //Para evitar errores, pasamos todos los caracteres a minúscula
    foreach ($arrayAlumnos as $alumno => $valor) {
        $usuarios[]= array(strtolower($arrayAlumnos[$alumno]["caa"].substr(($arrayAlumnos[$alumno]["pp"]), 0,2).substr(($arrayAlumnos[$alumno]["ss"]), 0,2)
                               .substr(($arrayAlumnos[$alumno]["n"]), 0,1)));
                       }

    // Mostramos los usuarios de los alumnos
    echo '<table style="border:1px solid black; border-collapse:collapse;margin:10px;">
    <thead style="border-bottom: 1px solid black;"><th>índice</th><th>usuario</th></thead><tbody>';
    foreach ($usuarios as $usuario => $indice) {
      echo "<tr>";
      foreach ($indice as $valor) {
        echo "<td>" . ($usuario+1) . "</td>";
        echo "<td>" . $valor . "</td>";
      }
      echo "</tr>";
    }
    echo "</tbody></table></div>";
          //see_code button
      if(isset($_POST['ver_codigo'])){
      verCodigo(__FILE__);
    }
    echo '<div style="clear:both;">';
    botonVer();
    echo '</div>';
    ?>
