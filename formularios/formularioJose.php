<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
print_r($_POST);
// Declaramos las variables formulaio
$name = $email = $gender = $comment = $website = "";
// Decarar variables error
$nameErr = $emailErr = $genderErr = $websiteErr = "";
//Variable complementarias para rb
$checkF=$checkM="";
//Array para los checks seleccionados.
$checkCB=array('Bike'=>'',
			   'Car'=>'');

//Array para los check de la selección
$checkSel[1] =$checkSel[2] =$checkSel[3] ="";
$lerror = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	$lerror = true;
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
	$lerror = true;
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
// Proceso de los rb
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
	$lerror = true;
  } else {
    $gender = test_input($_POST["gender"]);
	if ($gender == 'male') {
	    $checkM= "checked";
	}
	else {
	    $checkF= "checked";
	}
  }
// Proceso del array de checkbox.
// Lo hacemos con un array asociativo para manejos complejos,
// podriamos utilizar variables diferentes
  $transporte = $_POST['vehicle'];
  $checkCB['Bike']= (in_array('Bike',$transporte)) ? ' checked' :'';
  $checkCB['Car'] = (in_array('Car',$transporte))  ? ' checked' :'';

// Proceso para la selección
  $seleccion = $_POST['combo']; //No es necesario limpiar
  $checkSel[$seleccion] = ' selected';

// Proceso para la selección múltiple
  $cars = $_POST['cars']; //No es necesario limpiar

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!isset($_POST['submit']) OR $lerror) {
?>
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female"<?php echo " $checkF";?>>Female
  <input type="radio" name="gender" value="male"<?php echo " $checkM";?>>Male
  <span class="error">* </span>
  <br><br>
  Transport:
  <br><br>
  <input type="checkbox" name="vehicle[]" value="Bike" <?php echo $checkCB['Bike'];?>> I have a bike
  <br><br>
  <input type="checkbox" name="vehicle[]" value="Car" <?php echo  $checkCB['Car'];?>> I have a car
  <br><br>
  Selecciona la opción deseada:
  <select name="combo">
    <!-- Opciones de la lista -->
    <option value="1" <?php echo  $checkSel[1];?>>Opción 1</option>
    <option value="2" <?php echo  $checkSel[2];?>>Opción 2</option>
    <option value="3" <?php echo  $checkSel[3];?>>Opción 3</option>
  </select>
  <br><br>
  <select name="cars[]" multiple>
      <option value="volvo">Volvo</option>
      <option value="saab">Saab</option>
      <option value="opel">Opel</option>
      <option value="audi">Audi</option>
  </select>
  <input type="submit" name="submit" value="Submit">
  <br><br>

</form>

<?php
} else {
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
echo "<br>";
foreach ($transporte as $elemento) {
    echo $elemento."<br/>";
}

echo "<br>";
foreach ($cars as $elemento) {
    echo $elemento."<br/>";
}

// ¿Como podemos ver la lista?
//Cambiar para utilizar un array


}
?>

</body>
</html>
