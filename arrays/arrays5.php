<!DOCTYPE html>
 <html lang="es">
    <head>
        <meta charset="utf-8" />
        <title> Ejercicio Arrays 5</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>Array con Verbos irregulares</h1>
        <h3>Muestra los verbos irregulares en infinitivo, pasado y participio</h3>
      <?php
    include '../verCodigo.php';
    /*
    * Muestra los verbos irregulares en ingles
    * @author Pablo Leon Alcaide
    * @version 1.0
    */
    if(isset($_POST['ver_codigo'])){

      verCodigo(__FILE__);

    }else{
        // Array multidimensional
        $verbos = array(
            array(
                "espanol" => "Elevarse",
                "infinitivo" => "Arise",
                "pasado" => "Arose",
                "participio" => "Arosen",
            ),
            array(
                "espanol" => "Despertar",
                "infinitivo" => "Awake",
                "pasado" => "Awoke",
                "participio" => "Awoken"
            ),
            array(
                "espanol" => "Golpear",
                "infinitivo" => "Beat",
                "pasado" => "Beat",
                "participio" => "Beat",
            ),
            array(
                "espanol" => "Convertirse en",
                "infinitivo" => "become",
                "pasado" => "became",
                "participio" => "become",
            ),
            array(
                "espanol" => "Iniciar",
                "infinitivo" => "Begin",
                "pasado" => "Began",
                "participio" => "Begun"
            ),
            array(
                "espanol" => "Doblar",
                "infinitivo" => "Bet",
                "pasado" => "Bet",
                "participio" => "Bet"
            ),
            array(
                "espanol" => "Atar",
                "infinitivo" => "Bind",
                "pasado" => "Bound",
                "participio" => "Bound"
            ),
            array(
                "espanol" => "Morder",
                "infinitivo" => "Bite",
                "pasado" => "Bit",
                "participio" => "Bitten"
            ),
            array(
                "espanol" => "Soplar",
                "infinitivo" => "Blow",
                "pasado" => "Blew",
                "participio" => "Blown"
            ),
            array(
                "espanol" => "Romper",
                "infinitivo" => "Break",
                "pasado" => "Broke",
                "participio" => "Broken"
            ),
            array(
                "espanol" => "Traer",
                "infinitivo" => "Bring",
                "pasado" => "Brought",
                "participio" => "Brought"
            ),
            array(
                "espanol" => "Construir",
                "infinitivo" => "Build",
                "pasado" => "Built",
                "participio" => "Built"
            ),
            array(
                "espanol" => "Quemar",
                "infinitivo" => "Burn",
                "pasado" => "Burnt",
                "participio" => "Burnt"
            ),
            array(
                "espanol" => "Comprar",
                "infinitivo" => "Buy",
                "pasado" => "Bought",
                "participio" => "Bought"
            ),
        );
        echo '<table style="border:2px solid black; border-collapse:collapse;"><tr>
        <td style="border:1px solid black;">Verbo</td><td style="border:1px solid black;">
        Infinitivo</td><td style="border:1px solid black;"> Pasado</td><td style="border:1px solid black;">
        Participio</td>';
        foreach ($verbos as $tiempo){
          echo '<tr style="border: 1px solid red;">
          <td style="border: 1px solid black;background-color:lightblue">'.$tiempo["espanol"].'</td>
          <td style="border: 1px solid black;">'.$tiempo["infinitivo"].'</td>
          <td style="border: 1px solid black;">'.$tiempo["pasado"].'</td>
          <td style="border: 1px solid black;">'.$tiempo["participio"].'</td>
          </tr>';
        }
        echo '<tr><td><a href="http://www.monografias.com/trabajos95/verbos-irregulares-ingles/verbos-irregulares-ingles.shtml">
        Ver Más</a></td></tr>';
        echo '</table>';


    botonVer();
    }
    ?>


    </body>
    <a href="../index.php">Regresar</a>
</html>
