<?php 

	#Habilitamos el uso de variables de sesion
	session_start();

	# Validamos que existan las variables de sesion
	if (isset($_SESSION['id'])) 
	{

	#Mandamos llamar el archivo de conexion a la BD
	require_once('conex.php');

	$funciones = new Funciones();

	$conexion = $funciones->conectar();

	#Si el usuario publica un TWEET
	if (isset($_POST['btnTweet'])) 
	{
		$idUser= $_POST['idUser'];
		$tweet= $_POST['tweet'];

		#Creamos la consulta INSERT para agregar el Tweet a la tabla de la BD
		$insert = "INSERT INTO tweet(tweet, idUsuario) VALUES ('{$tweet}', {$idUser});";

		#Mandamos la consulta a la BD
		if ($conexion->query($insert)) {
			echo "Tweet publicado correctamente";

			#Modificamos la fecha del ultimo Tweet del usuario
			$update = "UPDATE usuario
						SET fechaUltimoTweet = (SELECT curdate() FROM dual)
						WHERE idUsuario = {$_SESSION['id']};";

			$conexion->query($update);

		}
		else
		{
			echo "ERROR: {$conexion->error} <br>";
			echo $insert . "<br>";
		}
	}

	#Si el usuario elimina un Tweet
	if (isset($_GET['t'])) 
	{
		 $delete = "DELETE FROM tweet
					WHERE idTweet={$_GET['t']};";

			#Mandamos la onsulta a la BD
					if ($conexion->query($delete)) 
					{
						echo "Tweet eliminado correctamente <br>";
					}
					else
					{
						echo $conexion->error . "<br>";
						echo $delete;
					}
	}

	#Buscamos todos los Tweets de la BD (Aqui buscamos los datos en la BD)
	$timeline = "SELECT tweet.idTweet, tweet.tweet, tweet.fechaTweet, usuario.username,  tweet.idUsuario
					FROM tweet, usuario
					WHERE tweet.idUsuario = usuario.idUsuario
					ORDER BY tweet.fechaTweet DESC;";

	#Mandamos la consulta a la BD (Aqui guardamos los resultados)
	$tweets = $conexion->query($timeline);



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>TimeLine</title>
</head>
<body>

<h1>Bienvenido <?php echo $_SESSION['user']; ?></h1>

<h3>¿Que esta pasando?</h3>

<form action="#" method="POST">
	<input type="hidden" name="idUser" value=" <?php echo $_SESSION['id'];?>"><br>
	<textarea name="tweet"></textarea><br>
	<input type="submit" name="btnTweet" value="Twittear"><br>

</form>

<table>
	<?php 
	while ($t = $tweets->fetch_assoc()) {?>

	<tr>
		<td> <a href="perfil.php?u=<?php echo $t['username']; ?>"> @<?php echo $t['username']; ?> </a> </td>
		<td> <?php echo $t['tweet'] . " (" . $t['fechaTweet'] . ")"; ?>   </td>
		<td> <?php if($t['idUsuario'] == $_SESSION['id']) {echo " <a href='timeline.php?t={$t['idTweet']}'> 
		Eliminar</a>";} ?></td>
	</tr>

	<?php } ?>
</table>

<br> <br>

<a href="index.php?salir=1">Cerrar Sesion</a>


</body>
</html>

<?php } 
else
{
	header("Location: index.php");
}

	?>