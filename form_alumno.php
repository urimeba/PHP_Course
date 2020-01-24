<!DOCTYPE html>
<html>
<head>
	<title>Formulario Alumno</title>
</head>
<body>

<h2>Ingrese los datos del alumno</h2>

<form method="GET" action="datos_alumno.php">
	Expediente: <input type="number" name="expediente"><br>
	Nombre: <input type="text" name="nombre"><br>
	Semestre: <input type="number" name="semestre"><br>
	Plan: <select name="plan">
		<option value="INC11">INC11</option>
		<option value="INF11">INF11</option>
		<option value="LAT11">LAT11</option>
		<option value="SOF11">SOF11</option>
		<option value="TEL11">TEL11</option>
		</select><br>
	Correo: <input type="email" name="correo"><br>
	Promedio: <input type="number" name="promedio"><br>
	<input type="submit" name="btnEnviar" value="Enviar"><br>


</form>

</body>
</html>