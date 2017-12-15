<!DOCTYPE html>
 <html lang="es">
    <head>
        <meta charset="utf-8" />
        <title> Ejercicio Arrays 4</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>Array con Calificaciones</h1>
        <h3>Muestra las calificaciones de los alumnos</h3>
        <p>
          Las notas son aleatorias, el alumno no se hace responsable de los resultados
        </p>
    <?php
    include '../verCodigo.php';
    /*
    * Muestra las notas de los alumnos de 2º de DAW para el módulo de DWES
    * @author Pablo Leon Alcaide
    * @version 1.0
    */
    if(isset($_POST['ver_codigo'])){

      verCodigo(__FILE__);

    }else{
        // Array multidimensional
        $alumnos = array(
            array(
                "nombre" => "Nieves Borrero",
                "eval1" => $aleatorio = rand (5, 10),
                "eval2" => $aleatorio = rand (5, 10),
                "eval3" => $aleatorio = rand (5, 10)
            ),
            array(
                "nombre" => "Pablo León",
                "eval1" => $aleatorio = rand (5, 10),
                "eval2" => $aleatorio = rand (5, 10),
                "eval3" => $aleatorio = rand (5, 10)
            ),
            array(
                "nombre" => "Victoriano Sevillano",
                "eval1" => $aleatorio = rand (5, 10),
                "eval2" => $aleatorio = rand (5, 10),
                "eval3" => $aleatorio = rand (5, 10)
            ),
            array(
                "nombre" => "Rafael Mellado",
                "eval1" => $aleatorio = rand (5, 10),
                "eval2" => $aleatorio = rand (5, 10),
                "eval3" => $aleatorio = rand (5, 10)
            ),
            array(
                "nombre" => "David Mateo",
                "eval1" => $aleatorio = rand (5, 10),
                "eval2" => $aleatorio = rand (5, 10),
                "eval3" => $aleatorio = rand (5, 10)
            ),
            array(
                "nombre" => "Pedro Caballero",
                "eval1" => $aleatorio = rand (5, 10),
                "eval2" => $aleatorio = rand (5, 10),
                "eval3" => $aleatorio = rand (5, 10)
            ),
            array(
                "nombre" => "Javi Ponferrada",
                "eval1" => $aleatorio = rand (5, 10),
                "eval2" => $aleatorio = rand (5, 10),
                "eval3" => $aleatorio = rand (5, 10)
            ),
            array(
                "nombre" => "Alberto Pérez",
                "eval1" => $aleatorio = rand (5, 10),
                "eval2" => $aleatorio = rand (5, 10),
                "eval3" => $aleatorio = rand (5, 10)
            ),
            array(
                "nombre" => "Juan Rueda",
                "eval1" => $aleatorio = rand (5, 10),
                "eval2" => $aleatorio = rand (5, 10),
                "eval3" => $aleatorio = rand (5, 10)
            ),
        );
        echo '<table style="border:2px solid black; border-collapse:collapse;"><tr>
        <td style="border:1px solid black;">Alumno</td><td style="border:1px solid black;">
        1 Eval</td><td style="border:1px solid black;"> 2 Eval</td><td style="border:1px solid black;">
        3 Eval</td>
        <td style="border:1px solid black;"> Eval Final</td></tr>';
        foreach ($alumnos as $alumno){ // Recorre cada elemento del array $alumnos, que en este caso son otros arrays
          // $alumno["nombre"] --> llama a la posicion "nombre" de cada elemento del array asociativo
          echo '<tr style="border: 1px solid red;">
          <td style="border: 1px solid black;">'.$alumno["nombre"].'</td>
          <td style="border: 1px solid black;">'.$alumno["eval1"].'</td>
          <td style="border: 1px solid black;">'.$alumno["eval2"].'</td>
          <td style="border: 1px solid black;">'.$alumno["eval3"].'</td>
          <td style="border: 1px solid red;" >'.(round(($alumno["eval1"]+$alumno["eval2"]+$alumno["eval3"])/3)).
          '</td></tr>';
        }//round(valor) redondea el valor a un entero
        echo '</table>';


    botonVer();
    }
    ?>


    </body>
    <a href="../index.php">Regresar</a>
</html>
