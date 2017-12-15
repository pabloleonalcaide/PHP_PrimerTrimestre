<?
ob_start();
session_start();
/* Elimina un contacto y vuelve a la url inicial */
//evitamos que entre aquí si no es a través de una petición Get con el parametro id
if(!isset($_GET['id'])){
    header('Location: ../main.php?page=agendaBaseDatos/indexAgenda');
}else{
    require_once 'Contactos.php';
    //creamos la conexión
    $contacto = new Contactos();
    $id = $_GET['id'];
    //eliminamos el contacto
  $contacto->eliminarContacto($id);
  //redirigimos a la agenda
header('Location: ../main.php?page=agendaBaseDatos/indexAgenda');
}
?>
