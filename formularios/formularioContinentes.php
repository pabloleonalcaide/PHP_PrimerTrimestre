<!--Utilizando el array de continentes y países, crea un script que lea en un formulario un continente
y nos muestre sus países con sus capitales y banderas. -->
<!DOCTYPE html>
 <html lang="es">
    <head>
        <title>Formulario continentes</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>Formulario Continente</h1>
        <h3>Selecciona un continente y se mostrarán algunos de sus países</h3>
      <?php
    include './verCodigo.php'; './arrays6.php';
    /*
    * Muestra los paises y banderas de un país en función del continente
    * seleccionado
    * @author Pablo Leon Alcaide
    * @version 1.0
    */
    if(isset($_POST['enviar'])){
        function printContinent($country,$name){
      echo '<tr><td style="text-align:center"><b>'.$name.'</b></td></tr>';
      foreach ($country as $pais){
        echo '<tr style="border: 1px solid red;">
        <td style="border: 1px solid black;">'.$pais["pais"].'</td>
        <td style="border: 1px solid black;">'.$pais["capital"].'</td>
        <td style="border: 1px solid black;"><img width="120px"; height="80px"; src="'.$pais["bandera"].'"/></td>
        </tr>';
      }
    }
      // Array multidimensional con el nombre de cada país, su capital y bandera
        $America = array(
            array(
                "pais" => "Canadá",
                "capital" => "Ottawa",
                "bandera" => "./banderas/canada.jpg",
            ),
            array(
                "pais" => "Argentina",
                "capital" => "Buenos Aires",
                "bandera" => "./banderas/argentina.jpg",
            ),
            array(
                "pais" => "Belice",
                "capital" => "Belmopan",
                "bandera" => "./banderas/belice.jpg",
            ),
            array(
                "pais" => "Peru",
                "capital" => "Lima",
                "bandera" => "./banderas/peru.jpg",
            ),
            array(
                "pais" => "Chile",
                "capital" => "Santiago de Chile",
                "bandera" => "./banderas/chile.jpg",
            ),

        );

        $Africa = array(
            array(
                "pais" => "Etiopia",
                "capital" => "Adis Adeba",
                "bandera" => "./banderas/etiopia.jpg",
            ),
            array(
                "pais" => "Mali",
                "capital" => "Bamako",
                "bandera" => "./banderas/mali.jpg",
            ),
            array(
                "pais" => "Senegal",
                "capital" => "Dakar",
                "bandera" => "./banderas/senegal.png",
            ),
            array(
                "pais" => "Congo",
                "capital" => "Kinsasa",
                "bandera" => "./banderas/congo.png",
            ),
            array(
                "pais" => "Angola",
                "capital" => "Luanga",
                "bandera" => "./banderas/angola.png",
            ),

        );
        $Asia = array(
            array(
                "pais" => "China",
                "capital" => "Pekin",
                "bandera" => "./banderas/china.jpg",
            ),
            array(
                "pais" => "India",
                "capital" => "Nueva Delhi",
                "bandera" => "./banderas/india.png",
            ),
            array(
                "pais" => "Japon",
                "capital" => "Kioto",
                "bandera" => "./banderas/japon.png",
            ),
            array(
                "pais" => "Mongolia",
                "capital" => "Ulan Bator",
                "bandera" => "./banderas/mongolia.jpg",
            ),
            array(
                "pais" => "Afganistan",
                "capital" => "Kabul",
                "bandera" => "./banderas/afganistan.png",
            ),

        );
        $Europa = array(
            array(
                "pais" => "Francia",
                "capital" => "Paris",
                "bandera" => "./banderas/francia.jpg",
            ),
            array(
                "pais" => "Italia",
                "capital" => "Roma",
                "bandera" => "./banderas/italia.png",
            ),
            array(
                "pais" => "Alemania",
                "capital" => "Berlin",
                "bandera" => "./banderas/alemania.png",
            ),
            array(
                "pais" => "Rusia",
                "capital" => "Moscu",
                "bandera" => "./banderas/rusia.png",
            ),
            array(
                "pais" => "Grecia",
                "capital" => "Atenas",
                "bandera" => "./banderas/grecia.png",
            ),

        );
        $Oceania = array(
            array(
                "pais" => "Australia",
                "capital" => "Canberra",
                "bandera" => "./banderas/australia.png",
            ),
            array(
                "pais" => "Fiyi",
                "capital" => "Suva",
                "bandera" => "./banderas/fiyi.png",
            ),
            array(
                "pais" => "Kiribati",
                "capital" => "Tarawa",
                "bandera" => "./banderas/kirivati.png",
            ),
            array(
                "pais" => "Samoa",
                "capital" => "Apia",
                "bandera" => "./banderas/samoa.png",
            ),
            array(
                "pais" => "Vanuatu",
                "capital" => "Port Vila",
                "bandera" => "./banderas/vanuatu.png",
            ),

        );
        echo '<table style="border:2px solid black; border-collapse:collapse;"><tr>
        <td style="border:1px solid black;">País</td><td style="border:1px solid black;">
        Capital</td><td style="border:1px solid black;"> Bandera</td>';
        if($_POST["continente"]==1){
            printContinent($Europa,"Europa");
            echo '</table>';
        }else if($_POST["continente"]==2){
            printContinent($Asia,"Asia");
            echo '</table>';
        }else if($_POST["continente"]==3){
            printContinent($America,"América");
            echo '</table>';
        }else if($_POST["continente"]==4){
            printContinent($Oceania,"Oceania");
            echo '</table>';
        }else{
            printContinent($Africa,"Africa");
            echo '</table>';
        }




    }else{
        if(isset($_POST['ver_codigo'])){
          verCodigo(__FILE__);
        }
    echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
      <label>Continente</label><select name="continente">
        <option value="1">Europa</option><option value="2">Asia</option>
        <option value="3">América</option><option value="5">África</option>
        <option value="4">Oceanía</option></select>
      <input type="submit" name="enviar" value="Solicitar" />
    </form><br /><br />';

    botonVer();
    }
    ?>
    </body>
    <a href="../php">Regresar</a>
</html>
