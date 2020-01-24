<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Registro</title>
	<meta charset="utf-8">
</head>
<body>

<h1>Ingresa tus datos</h1>

<form method="POST" action="datos_registro.php">
	Nombre: <input type="text" name="nombre"><br>
	Correo: <input type="email" name="correo"><br>
	Contraseña: <input type="password" name="pass"><br>
	Genero:	<input type="radio" name="genero" value="masculino"> Masculino
			<input type="radio" name="genero" value="femenino">Femenino
			<br>
	Fecha de Nacimiento: <input type="date" name="fechaNac"><br>
	<input type="submit" name="Enviar">
	<br>
</form>


</body>
</html>