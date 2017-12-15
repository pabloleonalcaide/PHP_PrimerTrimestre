<?php
/**
* @author Pablo Leon
* @version 1.0
* Contador de entradas a un sitio web a través de las cookies almacenadas
*
*/
ob_start();
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

  ob_end_flush();
 ?>
