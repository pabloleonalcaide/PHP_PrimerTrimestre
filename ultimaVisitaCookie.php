<?php
ob_start();
if(isset($_COOKIE['fechaHora'])){
  $ultimaVisita = $_COOKIE['fechaHora'];
  echo 'fecha de ultima visita: '.$_COOKIE['fechaHora'];
}else{
  echo 'es su primera visita a este sitio web';
}
$fecha = date("j/n/Y");
$hora = date("h:i:s");
$vfecha = ''.$fecha.' - '.$hora.'';
setcookie('fechaHora',$vfecha, time()+3600*24*365*100);
ob_end_flush();
?>
