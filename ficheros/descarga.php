<?php
$fichero = $_GET['archivo'];
header("Content-disposition: attachment; filename=$fichero");
header("Content-type: text/plain");
readfile("$fichero");
?>
