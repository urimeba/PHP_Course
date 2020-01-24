<!DOCTYPE html>
<html>
<head>
	<title>Datos del registro</title>
</head>
<body>

<h1>Datos de Registro</h1>

Nombre: <?php echo $_POST['nombre']; ?><br>
Correo: <?php echo $_POST['correo']; ?><br>
Genero:<?php echo $_POST['genero']; ?><br>
Fecha de nacimiento: <?php echo $_POST['fechaNac']; ?><br>

<br>

<a href="form_registro.php">Volver al formulario</a>

</body>
</html>