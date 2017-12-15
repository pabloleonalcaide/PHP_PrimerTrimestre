<?php
    ob_start();
    include './verCodigo.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="./style.css" type="text/css">
        <meta charset="UTF-8"/>
        <title>Pablo Leon</title>
    </head>
    <body>
        <h1>Gestión de Multas</h1>
        <?
        //Controlador
        if (!isset($_GET['page'])) {
            include('index.php');
        } else {
            include($_GET['page'].".php");
        }
        //Ver Código
        if(isset($_POST['ver_codigo'])){
          verCodigo(__FILE__);
      }else {
        botonVer();
      }
        ?>
    </body>
</html>
<?
ob_end_flush();
?>
