<!DOCTYPE html>
<html>
<head>
	<title>Datos del Alumnos</title>
</head>
<body>

<h1>Datos del Alumno</h1>

<?php 

	# Recuperamos los datos del formulario
	$expediente = $_GET['expediente'];
	$nombre = $_GET['nombre'];
	$semestre = $_GET['semestre'];
	$plan = $_GET['plan'];
	$correo = $_GET['correo'];
	$promedio = $_GET['promedio'];

	switch ($plan) {
		case 'INC11':
			$carrera = "Ingenieria en Computacion";
			break;

		case 'INF11':
			$carrera = "Licenciatura en Informatica";
			break;

		case 'SOF11':
			$carrera = "Ingenieria de Software";
			break;

		case 'LAT11':
			$carrera = "Lic. en Admon. de las TIC's";
			break;

		case 'TEL11':
			$carrea = "Ingenieria en Telecomunicaciones y Redes";
			break;
		
		default:
			$carrera = "Carrera Desconocida";
			break;
	}



 ?>

Expediente: <?php echo $expediente; ?><br>
Nombre: <?php echo $nombre; ?><br>
Semestre: <?php echo $semestre; ?><br>
Carrera: <?php echo $carrera; ?><br>
Coreo: <?php echo $correo; ?><br>
Promedio: <?php echo $promedio; ?><br>

<br>

<a href="form_alumno.php">Volver al Formulario</a>

</body>
</html>