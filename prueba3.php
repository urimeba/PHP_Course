<!DOCTYPE html>
<html>
<head>
	<title>Introduccion a PHP</title>
</head>
<body>

<?php

	# -Creamos una variable para almacenar un nombre
	$nombre = "Uriel";

	# Imprimimos un mensaje con la variable anterior
	echo "Hola " . $nombre;
	echo " <br> ";

	# Declaramos una varible para almacenar la edad
	$edad = 21;
	

	echo "Tienes " . $edad . " años <br>";

	if ($edad >=16) {
		echo "Puedes tener licencia de manejo. <br>";
	} else {
		echo "Eres muy joven para conducir. <br>";
	}

	#  Para hacer alta de materias primero, tu promedio debe ser mayor a 9 o tu semestre debe ser mayor o igual a 7°
	$promedio = 8.1;
	$semestre = 5;

	if ($promedio > 9.0 || $semestre >= 7) 
	{
	echo "Puedes hacer altas primero. <br>";
	} else {
		echo "Puedes hacer tu alta de materias despues. <br>";
	}

	# Para poder hacer alta de materias se requiere tener la hoja de prealtas y la carta de liberacion de tutorias
	$tienePrealta = true;
	$tieneCarta = true;

	if ($tienePrealta == true && $tieneCarta == true) {
		echo "Puedes hacer alta de materias <br>";
	}
	else {
		echo "NO puedes hacer la prealta <br>";
	}

	echo "<br>";

	# Mandamos llamar el archivo prueba4.php

	require_once('prueba4.php');
	


	echo "Este es el final del documento.";

 ?>

</body>
</html>