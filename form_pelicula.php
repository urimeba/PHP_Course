<!DOCTYPE html>
<html>
<head>
	<title>Formulario Pelicula</title>
</head>
<body>

<?php 

/*Si se envia el formulario...*/
if(isset($_POST['btnEnviar'])) {
	echo "<h1>Datos de la Pelicula</h1>";
	echo "Titulo: " .$_POST['nombrePelicula']."<br>";
	echo "Director: " .$_POST['director']."<br>";
	echo "Estudio: " .$_POST['estudio']."<br>";
	echo "Año: " .$_POST['year']."<br>";
	echo "<br>";
	echo "<a href=form_pelicula.php>Volver al formulario </a>";
} else{

 ?>

<h1>Ingrese los datos de las peliculas</h1>

<form method="POST" action="#"> <!-- El signo de gato en la propiedad action simboliza enviar los archivos a este mismo documento --> 
	<input type="text" name="nombrePelicula" placeholder="Titulo"><br>
	<input type="text" name="director" placeholder="Director"><br>
	<input type="text" name="estudio" placeholder="Estudio"><br>
	<input type="text" name="year" placeholder="Año"><br>
	<input type="submit" name="btnEnviar" value="Enviar"><br>
</form>

<?php } ?>

</body>
</html>