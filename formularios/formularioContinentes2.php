
<!DOCTYPE html>
<!-- Utilizando el array de continentes, crea un script con una lista de continentes de manera que al
seleccionar uno, una segunda lista se cargue una segunda lista con los países. Al seleccionar un
país se mostrará la capital y la bandera.fo -->
 <html lang="es">
    <head>
        <title>Formulario continentes</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>Formulario Continente 2</h1>
        <h3>Selecciona un continente y se mostrarán algunos de sus países</h3>
        <h3>En los cuales se eligirá el país</h3>
      <?php
    include './verCodigo.php';
//    print_r($_POST);
    /*
    * Muestra los paises y banderas de un país en función del continente seleccionado
    * @author Pablo Leon Alcaide
    * @version 1.0
    */

    // Array multidimensional con el nombre de cada país, su capital y bandera
      $opcion = "";
      $continentes = array (
          "America" => array(
            "Canada" => array(
              "pais" => "Canadá",
              "capital" => "Ottawa",
              "bandera" => "./banderas/canada.jpg",
            ),
            "Argentina" =>  array(
              "pais" => "Argentina",
              "capital" => "Buenos Aires",
              "bandera" => "./banderas/argentina.jpg",
            ),
            "Belice" => array(
              "pais" => "Belice",
              "capital" => "Belmopan",
              "bandera" => "./banderas/belice.jpg",
          ),
          "Peru" => array(
              "pais" => "Peru",
              "capital" => "Lima",
              "bandera" => "./banderas/peru.jpg",
          ),
        ),
      "Africa" => array(
        "Etiopia" =>  array(
              "pais" => "Etiopia",
              "capital" => "Adis Adeba",
              "bandera" => "./banderas/etiopia.jpg",
          ),
        "Mali" =>  array(
              "pais" => "Mali",
              "capital" => "Bamako",
              "bandera" => "./banderas/mali.jpg",
          ),
        "Senegal" =>  array(
              "pais" => "Senegal",
              "capital" => "Dakar",
              "bandera" => "./banderas/senegal.png",
          ),
        "Congo" =>  array(
              "pais" => "Congo",
              "capital" => "Kinsasa",
              "bandera" => "./banderas/congo.png",
          ),
        ),
        "Asia" => array(
        "China" => array(
              "pais" => "China",
              "capital" => "Pekin",
              "bandera" => "./banderas/china.jpg",
          ),
      "Japon" =>  array(
              "pais" => "Japon",
              "capital" => "Kioto",
              "bandera" => "./banderas/japon.png",
          ),
      "Mongolia" =>  array(
              "pais" => "Mongolia",
              "capital" => "Ulan Bator",
              "bandera" => "./banderas/mongolia.jpg",
          ),
      "Afganista" =>  array(
              "pais" => "Afganistan",
              "capital" => "Kabul",
              "bandera" => "./banderas/afganistan.png",
          ),
        ),
        "Europa" => array(
        "Francia" =>  array(
              "pais" => "Francia",
              "capital" => "Paris",
              "bandera" => "./banderas/francia.jpg",
          ),
        "Alemania" =>  array(
              "pais" => "Alemania",
              "capital" => "Berlin",
              "bandera" => "./banderas/alemania.png",
          ),
          "Rusia" => array(
              "pais" => "Rusia",
              "capital" => "Moscu",
              "bandera" => "./banderas/rusia.png",
          ),
        "Grecia" =>  array(
              "pais" => "Grecia",
              "capital" => "Atenas",
              "bandera" => "./banderas/grecia.png",
          ),
      ),
    );
      //Imprimimos el formulario de continentes
      echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                <fieldset><legend>Continentes</legend>
                <label>Continente:&nbsp</label>
                <select name="continente">';
          foreach ($continentes as $key => $value) {
              echo '<option value="'.$key.'">'.$key.'</option>';

          }

          echo '</select><br>
                <input type="submit" name="cargaPaises" value="mostrar">
                </fieldset>
              </form>';

      if(isset($_POST['cargaPaises'])){

          $continente = $_POST['continente'];

          echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
                   <fieldset><legend>Países</legend>
                   <label>Pais:</label>
                   <select name="pais">';
             foreach ($continentes[$continente] as $key => $value) {

                   echo '<option value="'.$key.'">'.$key.'</option>';
             }
             echo '</select><br>
                   <input type= "hidden" name="cont" value='.$continente.'/>
                   <input type="submit" name="cargaInfo" value="Enviar">
                   </fieldset>
                 </form>';

      }

      if(isset($_POST['cargaInfo'])){

          $continenteElegido = $_POST['cont'];
          $paisElegido = $_POST['pais'];

          echo '<table style=" margin: 0 auto; border:2px solid gray; text-align: center">';
          echo '<tr><th>País</th><th>Capital</th><th>Bandera</th>';
          foreach ($continentes as $key => $value) {
              if($key.'/'==$continenteElegido){
                  foreach ($value as $valor) {
                      if($valor["pais"]==$paisElegido){
                             echo '<tr><td style="border:1px solid gray;">'.$valor["pais"].'</td>
                               <td style="border:1px solid black;">'.$valor["capital"].'</td>
                                 <td style="border:1px solid black;"><img width="150px height="150px src="'.$valor["bandera"].
                                   '" /></td></tr>';
                                 }
                      }
              }

              }
          echo '</table>';

          }

    botonVer();
    ?>
    </body>
    <a href="../php">Regresar</a>
</html>
