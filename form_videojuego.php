<!DOCTYPE html>
<html>
<head>
	<title>Formulario Videojuegos</title>
</head>
<body>

<h1>Ingrese los datos del videojuego</h1>

<form method="POST" action="datos_videojuego.php">
	Título: <input type="text" name="titulo"><br>
	Desarrolladora: <input type="text" name="desarrolladora"><br>
	Consola: <select name="consola">
		<option value="Xbox One">Xbox One</option>
		<option value="PS4">PS4</option>
		<option value="Wii U">Wii U</option>

	</select><br>
	Tiene multijugador: 
	<input type="radio" name="multi" value="Si">Si
	<input type="radio" name="multi" value="No">No
	<br>
	Precio: <input type="number" name="precio"><br>
	<input type="submit" name="btnEnviar" value="Enviar">


</form>


</body>
</html>