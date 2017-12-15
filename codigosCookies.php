<?php
//ALMACÉN DE CÓDIGOS UTILIZADOS PARA ALMACENAR NÚMERO Y FECHA DE VISITAS A TRAVÉS
//DE COOKIES

/**
* @author Pablo Leon
* @version 1.0
* Contador de entradas a un sitio web a través de las cookies almacenadas
*
*/
ob_start();
include './verCodigo.php';
//Si la cookie no existe aún.. Avisamos de que almacenaremos cookies a partir de ahora
  if(!isset($_COOKIE['contador'])){
    echo 'es la 1ª vez que accedes a esta web, almacenaremos cookies';
    $contador = 1;
    //creamos la cookie con el contador a 1
    setcookie('contador',$contador);
  }else{
    //Si ya existe, sobreescribimos la cookie incrementando el índice de visita
    $contador = ++$_COOKIE['contador'];
    setcookie('contador',$contador,time()+3600*24*365*100);
    echo 'has entrado '.$_COOKIE['contador'].' veces a esta web';
  }

  //ob_end_flush();
 ?>

 <?php
 /**
 * @author Pablo Leon
 * @version 1.0
 * Almacena en una cookie la última visita
 */

 //ob_start();


 //Si la cookie existe, almacenamos en una variable la última visita
 if(isset($_COOKIE['fechaHora'])){
   $ultimaVisita = $_COOKIE['fechaHora'];
   echo 'fecha de última visita: '.$_COOKIE['fechaHora'];
 }else{
   echo 'es su primera visita a este sitio web';
 }
 //registramos la fecha y hora actual y la almacenamos en la cookie de nuevo
 $fecha = date("j/n/Y");
 $hora = date("h:i:s");
 $vfecha = ''.$fecha.' - '.$hora.'';
 setcookie('fechaHora',$vfecha, time()+3600*24*365*100);

    if(isset($_POST['ver_codigo'])){
      verCodigo(__FILE__);
    }

botonVer();
 ob_end_flush();
 ?>
