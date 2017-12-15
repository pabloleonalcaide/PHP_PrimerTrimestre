<?php
/**
* @author Pablo Leon
* @version 1.0
* Probando lectura de fichero
*/
/**
* Tomando una cadena devuelve las iniciales
*/
function tomarIniciales($linea){
  $array = explode(' ',$linea);
  $iniciales='';
  foreach ($array as $value) {
    $iniciales += substr($value, 2);
  }
  echo $iniciales;
};
?>
<html>
<head>
  <link rel="stylesheet" href="../layout.css" type="text/css">
  <meta charset="UTF-8"/>
  <title>lectura de fichero</title>
</head>
<body>
  <?
    $file =fopen("alumnos.txt","r") or exit("Unable to open file");
    $contador=0;
    while (!feof($file)) {
      //Si símplemente hicieramos echo de fgetc en el while imprimiría todos
      //los caracteres pero lo pondría todo en línea
      $linea=fgets($file);
      if($contador <8){  //nos aseguramos de limpiar la cabecera

      }else{
        //nl2br inserta saltos de linea html antes de todas las nuevas líneas de
        //un string
        tomarIniciales($linea);
      echo nl2br($linea);
    }
      $contador++;
    }
    fclose($file);
?>
</body>
</html>
