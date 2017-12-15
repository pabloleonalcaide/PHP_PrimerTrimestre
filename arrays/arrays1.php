<!DOCTYPE html>
 <html lang="es">
    <head>
        <title> Ejercicio Arrays 1</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>Array de Alumnos</h1>
        <h3>Muestra alumnos aleatoriamente</h3>
        <div style="text-align:center;">

    <?php
    include '../verCodigo.php';
    /*
    * Muestra alumnos aleatorios con su direccion ip y su imagen de perfil
    * @author Pablo Leon Alcaide
    * @version 1.0
    */
    if(isset($_POST['ver_codigo'])){

      verCodigo(__FILE__);

    }else{

        $alumnos = array(
            array(
                "nombre" => "Nieves Borrero",
                "direccion" => "https://192.168.12.1",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Javi Ponferrada",
                "direccion" => "192.168.115.52",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Miguel Gavilán",
                "direccion" => "192.168.115.238",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Víctor Gómez",
                "direccion" => "192.168.12.1",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Pedro Caballero",
                "direccion" => "192.168.115.151",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "David Mateo",
                "direccion" => "192.168.115.69",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Pablo León Alcaide",
                "direccion" => "192.168.115.177",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "jesus mejias",
                "direccion" => "192.168.115.163",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "juan rueda",
                "direccion" => "192.168.115.238",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Soledad María Cruz",
                "direccion" => "192.168.115.115",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Alberto Pérez",
                "direccion" => "192.168.115.153",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Rafael Carmona",
                "direccion" => "192.168.115.131",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Victoriano Sevillano",
                "direccion" => "192.168.115.104",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Javi Ponferrada",
                "direccion" => "192.168.115.52",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Isabel M Gómez",
                "direccion" => "192.168.115.171",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Mario Ferrer",
                "direccion" => "192.168.115.123",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Daniel Gestino",
                "direccion" => "192.168.115.204",
                "foto" => "./ruta/image/perfil.jpg"
            ),
            array(
                "nombre" => "Jose Lucena",
                "direccion" => "192.168.115.198",
                "foto" => "./ruta/image/perfil.jpg"
            )

        );
    $aleatorio = rand (0, 17);

    echo 'el alumno es '.$alumnos [$aleatorio]["nombre"];
    echo '<br /><a href="'.$alumnos [$aleatorio]["direccion"].'">Ver Página</a>';
    echo '<br /><img src="'.$alumnos[$aleatorio]["foto"].'" width=250px;  height=250px;/>';

    botonVer();
    }
    ?>
  </div>

    </body>
    <a href="../index.php">Regresar</a>
</html>
