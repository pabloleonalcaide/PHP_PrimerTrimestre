<?php
/** Agenda de Contactos almacenada en una sesión
* @author Pablo Leon
* @version 1.0
*/

ob_start();
session_name('agenda');
session_start();
include './verCodigo.php';

if(isset($_POST['ver_codigo'])){
  verCodigo(__FILE__);
}
$index = $_GET['indice'];

?>
<html>
  <head>
        <title>Editar</title>
        <style>.error {color: #FF0000;} body{background-color: #fefbd8}
                h1{text-align:center;}
        </style>
        <meta charset="UTF-8" />
  </head>
  <body>
    <h1>Editar Contacto - Pablo León</h1>
    <div>
    <?
      echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
      <label>Nombre</label><input type="text" name="name" value="'
      .$_SESSION['contacts'][$index]['name'].'"/><br><br>
      <label>Teléfono</label><input type="text" maxlength="9" name="phone"  value="'
      .$_SESSION['contacts'][$index]['phone'].'"/><br><br>
      <input type="hidden" name="hidden" value="'.$index.'">
      <input type="submit" name="editar" value="Editar" /><br></form>';
    ?>
    </div>
  </body>
</html>
<? if(isset($_POST['editar'])){
  $index = $_POST['hidden'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];

  $_SESSION['contacts'][$index]['name'] = $name;
  $_SESSION['contacts'][$index]['phone'] = $phone;
  //Cerramos la ventana secundaria
  echo  "<script type='text/javascript'>";
  echo "window.close()";
  echo "</script>";
}?>
<?
  echo'<br />';
  botonVer();
  echo'<br />';
  include('./ultimaVisitaCookie.php');
  ob_end_flush();
 ?>
