<!DOCTYPE html>
<html>
<head>
	<title>Datos del Videojuego</title>
</head>
<body>

<h1>Datos del Videojuego</h1>

<?php 

echo "Titulo: " .$_POST['titulo']."<br>";
echo "Desarrolladora: " .$_POST['desarrolladora']."<br>";
echo "Consola: " .$_POST['consola']."<br>";
echo "Multijugador: " .$_POST['multi']."<br>";
echo "Precio: " .$_POST['precio']."<br>";
echo "<br>";
echo "<a href=form_videojuego.php>Volver al Formulario</a>";


 ?>

</body>
</html>