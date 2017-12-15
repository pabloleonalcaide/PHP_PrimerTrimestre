<?php
    ob_start();
    include ('./verCodigo.php');
    include ('ultimaVisitaCookie.php');
?>
<html>
    <head>
        <link rel="stylesheet" href="./style.css" type="text/css">
        <meta charset="UTF-8"/>
        <title>Pablo Leon</title>
    </head>
    <body>
        <nav>
            <ul>
                <li> <a href="../php/index.php">PHP</a> </li>
                <li> <a href="../android/index.html">Android</a> </li>
                <li> <a href="https://www.github.com/pabloleonalcaide">Github</a></li>
            </ul>
        </nav>
        <?
        if (!isset($_GET['page'])) {
            include('index.php');
        } else {
            include($_GET['page'].".php");
        }
        ?>
    </body>

</html>
<?
ob_end_flush();
?>
