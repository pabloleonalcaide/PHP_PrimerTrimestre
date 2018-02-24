<?php
include('../verCodigo.php');
require ('Contactos.php');
ob_start();
/**
* @author Pablo Leon Alcaide
* @version 1.0
*/
$contactos = new Contactos();
?>
<style>
	fieldset{width:30%; margin:0 auto; color:green;}
</style>

 <form action="../php/main.php?page=agendaBaseDatos/insert" method="post">
    <fieldset style="text-align:center">
        <legend> Insertar Usuario</legend>
        <label>Nombre</label><br />
        <input type="text" name="name"><br />
        <label>Apellido1</label><br />
        <input type="text" name="subname1"><br />
        <label>Apellido2</label><br />
        <input type="text" name="subname2"><br />
        <label>Telefono</label><br />
        <input type="text" name="phone" ><br />
        <label>Email</label><br />
        <input type="text" name="email" ><br />
        <input type="submit" value="añadir" name="anadir" /><br />
    </fieldset>
 </form>
<button onclick="window.location.href='../php/main.php?page=agendaBaseDatos/indexAgenda'">Agenda</button>
<?

    if(isset($_POST['anadir'])){
        $nombre = limpiar($_POST['name']);
        $apellido1 = limpiar($_POST['subname1']);
        $apellido2 = limpiar($_POST['subname2']);
        $telefono = limpiar($_POST['phone']);
        $mail = limpiar($_POST['email']);
		if($contactos->insertarContacto($nombre,$apellido1,$apellido2,$telefono,$mail)){
			header('Location: ../php/main.php?page=agendaBaseDatos/indexAgenda');
		}else{

		}
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
