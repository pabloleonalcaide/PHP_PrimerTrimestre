<?php
include('../verCodigo.php');
require_once 'Contactos.php';
/**
* @author Pablo Leon Alcaide
* @version 1.0
*/
ob_start();
$contactos = new Contactos();
$eNombre = $eApellido1 = $eAPellido2 = $eCorreo = $eTelefono = "";
$_SESSION['valores']=array();

	$id = $_GET['id'];
	//recogemos la consulta y almacenamos el resultado en una variable
	$usuarios= $contactos->getContacto($id);
	//volcamos los campos de la tabla en una variable de session tipo array
	foreach ($usuarios as $key => $value) {
		foreach($value as $valor){
			$_SESSION['valores'][] =$valor;
		}
	}

	//asignamos a variables las columnas de la consulta
	$eId = $_SESSION['valores'][0]; //LUEGO USA ESTA VARIABLE DE SESIÓN EN VEZ DE HIDDEN
	$eNombre = $_SESSION['valores'][1];
	$eApellido1 = $_SESSION['valores'][2];
	$eApellido2 = $_SESSION['valores'][3];
	$eCorreo = $_SESSION['valores'][4];
	$eTelefono = $_SESSION['valores'][5];


 ?>
<style>
	fieldset{width:30%; margin:0 auto; color:green;}
</style>

 <form action="../main.php?page=agendaBaseDatos/edit" method="post">
    <fieldset style="text-align:center">
        <legend> Insertar Usuario</legend>
        <label>Nombre</label><br />
        <input type="text" name="name" value="<? echo $eNombre  ?>"><br />
        <label>Apellido1</label><br />
        <input type="text" name="subname1" value=<? echo $eApellido1 ?> ><br />
        <label>Apellido2</label><br />
        <input type="text" name="subname2" value=<? echo $eApellido2 ?> ><br />
        <label>Telefono</label><br />
        <input type="text" name="phone" value=<? echo $eTelefono ?> ><br />
        <label>Email</label><br />
        <input type="text" name="email" value=<? echo $eCorreo ?> ><br />
		<input type="hidden" name="id" value=<? echo $eId ?> > <br/>
        <input type="submit" value="editar" name="editar" /><br />
    </fieldset>
 </form>
<button onclick="window.location.href='../php/main.php?page=agendaBaseDatos/indexAgenda'">Agenda</button>
<?
echo $eId;

	//$contactos = new Contactos();
//	$contactos->editarContacto($eId, 'Esto', 'te', 'va', 'del', 'carajo');

    if(isset($_POST['editar'])){
		$contactos = new Contactos();
		$id = $_POST['id'];
        $nombre = limpiar($_POST['name']);
        $apellido1 = limpiar($_POST['subname1']);
        $apellido2 = limpiar($_POST['subname2']);
        $telefono = limpiar($_POST['phone']);
        $mail = limpiar($_POST['email']);
		$contactos->editarContacto($id,$nombre,$apellido1,$apellido2,$telefono,$mail);

	}
function limpiar($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if(isset($_POST['ver_codigo'])){
    verCodigo(__FILE__);
  }else{
      botonVer();
      echo'<br />';
      include('../ultimaVisitaCookie.php');
      ob_end_flush();
  }
?>
