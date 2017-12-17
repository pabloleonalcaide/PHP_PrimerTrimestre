<?php
/** Agenda de Contactos almacenada en una sesión
* @author Pablo Leon
* @version 1.0
*/

ob_start();
session_name('agenda');
session_start();
$vacio="";
$errorMsj="";
include './verCodigo.php';
$_SESSION['contactos'] = array();


//Insertar contactos
if(isset($_POST['add'])){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $oneContact = array("name" =>$name, "phone" =>$phone,);
  $_SESSION['contacts'][] = $oneContact;
}
//Si pulsa Editar Contactos
if(isset($_POST['edit'])){
  if(!empty($_POST['checkbox'])){
    $count=0;
           foreach($_POST['checkbox'] as $selected){
                   $count++;
           }
           if($count>1){
             $errorMsj="Sólo puedes editar un contacto a la vez";
           }else{
             $errorMsj="";
              $link= "<script>window.open('./editaContactos.php/?indice=".$selected."','',' width=300, height=400')</script>";
              echo $link;
           }
       }

}
//Si hace click en eliminar
if(isset($_POST['delete'])){
  foreach($_POST['checkbox'] as $selected){
    unset($_SESSION['contacts'][$selected]);
  }
}
if(isset($_POST['ver_codigo'])){
  verCodigo(__FILE__);
}

?>
<html>
  <head>
        <title>Agenda Contactos</title>
        <style>.error {color: #FF0000;} body{background-color: #fefbd8}
                h1{text-align:center;}
        </style>
        <meta charset="UTF-8" />
  </head>
  <body>
    <h1>Agenda de Contactos - Pablo León</h1>
    <div>
    <?
    //Formulario superior de búsqueda/inserción
    echo'<span class="error">'.$errorMsj.'</span>
    <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';?>
      <label>Buscar  </label><input type="text" name="buscar" />
      <input type="submit" name="search" value="search" />
      <input type="submit" name="anadir" value="+" />
      <br />
    </form>
<?
    if(isset($_POST['anadir'])){
        formAnadir();
    }
    //Buscar un contacto
    if(isset($_POST['search'])){
      $busqueda = $_POST['buscar'];
      if(empty($busqueda)){
        $vacio ="No has introducido nada";
        echo ' <span class="error">'. $vacio .'</span>';
      }else{
      $vacio="";
      mostrarListado($busqueda);
      }
    }
?>
    </div>
  </body>
</html>

<?
/** Muestra contactos segun criterio de busqueda */
  function mostrarListado($busqueda){

    echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
    echo '<table><thead><tr><th>Nombre</th><th>Phone</th><th>Seleccionar</th></thead></tr><tbody>';

        if(empty($_SESSION['contacts'])){
          //Si no hay contactos
        }else{
         foreach($_SESSION['contacts'] as $clave=>$contact){
           //Expresion regular para checkear la búsqueda
           if(preg_match("/$busqueda/",$contact["name"])){
                echo '<tr><td>' . $contact["name"] . '</td>' .
                '<td>' . $contact["phone"] . '</td>';
                echo '<td> <input type="checkbox" name="checkbox[]" value="'.$clave.'"  ></td>
                <td></td></tr>';
          }
        }
         echo '</tbody></table><br />';
         echo '<input type="submit" value="edit" name="edit" />
         <input type="submit" name="delete" value="Borrar Seleccionados"/><br />';
       echo '</form>';}
     }

/** Despliega formulario para añadir contacto */
  function formAnadir(){
    echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
      <label>Nombre</label><input type="text" name="name" /><br /><br />
      <label>Teléfono</label><input type="text" name="phone" /><br /><br />
      <input type="submit" name="add" value="add" />
      <br />
    </form>';}

  echo'<br />';
  botonVer();
  echo'<br />';
  include('./ultimaVisitaCookie.php');
  ob_end_flush();
 ?>
