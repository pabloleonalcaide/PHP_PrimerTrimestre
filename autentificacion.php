<?php
ob_start();
include './verCodigo.php';
?>
<html>
<head>
  <link rel="stylesheet" href="../layout.css" type="text/css">
  <meta charset="UTF-8"/>
  </head>
  <body>

<?
if (!isset($_SESSION['auth']))
    $_SESSION['auth'] = false;

if (isset($_SESSION['auth']))
    echo'<p>login correcto</p>';

if (isset($_POST['login'])) {
    if ($_POST['user'] == "usuario" && $_POST['password'] == "1234") {
        $_SESSION['auth'] = true;
        echo '<p>login correcto</p>';
    } else {
        $_SESSION['auth'] = false;
        echo "<p>Login incorrecto</p>";
    }
}

echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
echo "<label>Usuario:</label><br /><input type='text' name='user' required placeholder='usuario'><br />";
echo "<label>Password:</label><br /><input type='password' name='password' required placeholder='1234'><br />";
echo "<input type='submit' name='login' value='Login'>";
echo'<br />';
if(isset($_POST['ver_codigo'])){ verCodigo(__FILE__); }

botonVer();
echo'<br />';
include('./ultimaVisitaCookie.php');
ob_end_flush();
?>
    <br /><a style="color:white;" href=./index.php style="text-decoration:none;">Volver</a>
  </body>
</html>
