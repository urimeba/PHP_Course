<?php 

#Habilitamos las variables de Sesion
session_start();

#Validamos que haya datos en las variables de Sesion
if (isset($_SESSION['id'])) 
{
	#Mandamos llamar el archivo de CONEXION
	require_once('conex.php');

	$funciones = new Funciones();

	$conexion = $funciones->conectar();


	#Esta funcion sirve para cuando el USUARIO PUBLICA
	if (isset($_POST['btnPublicacion'])) 
	{
		$idUser = $_POST['idUser'];
		$publicacion = $_POST['publicacion'];

		#Creamos la consulta para mandar la PUBLICACION A LA BD
		$insert = "INSERT INTO publicacion(publicacion, idUsuario, perfilDe) VALUES ('{$publicacion}', '{$idUser}', '{$_SESSION['user']}'); ";

		#Mandamos la consulta a la BD
		if ($conexion->query($insert)) 
		{
			echo "Publicacion hecha correctamente";

			#Modificamos la fecha de la ultima publicacion
			$update = "UPDATE user
						SET fechaUltimaPublicacion = (SELECT curdate() FROM dual)
						WHERE idUsuario = {$_SESSION['id']}; ";

			$conexion->query($update);
		}
		else
		{
			echo "ERROR: {$conexion->error} <br>";
			echo $insert . "<br>";
		}
	}

	#Esta funcion esta para cuando el USUARIO elimina
	if (isset($_GET['p'])) 
	{
		$delete = "DELETE FROM publicacion
					WHERE idPublicacion = {$_GET['p']};";

		#Mandamos  la consulta a la BD
		if ($conexion->query($delete)) 
		{
			echo "Publicacion eliminada<br>" ;
		}
		else
		{
			echo $conexion->error. "<br>";
			echo $delete;
		}
	}

	#Buscamos las publicacion de la BD 
	$publicaciones = "SELECT publicacion.idPublicacion, publicacion.publicacion, publicacion.fechaPublicacion, 
							publicacion.idUsuario, user.username
							FROM publicacion, user
							WHERE publicacion.idUsuario = user.idUsuario
							ORDER BY publicacion.fechaPublicacion DESC;";

	#Mandamos la consulta a la BD
	$publicacionesUsuario = $conexion->query($publicaciones);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Facebook</title>
</head>
<body>

<h2>¡Bienvenido <?php echo $_SESSION['user']; ?>!</h2>

<h2>Realiza una publicacion</h2>

<form action="#" method="POST">
	<input type="hidden" name="idUser" value="<?php echo $_SESSION['id'];?>"> <br>
	<textarea name="publicacion"></textarea><br>
	<input type="submit" name="btnPublicacion" value="Publicar">
</form>

<br>
<br>


<h3>Publicaciones tuyas y de tus amigos:</h3>

<table>
	<?php while ($p = $publicacionesUsuario->fetch_assoc())
	{?>
	<tr>
		<td> <a href="perfil.php?u=<?php echo $p['username']; ?>"> @ <?php echo $p['username']; ?></a> </td>

		<td> <?php echo $p['publicacion'] . " (" . $p['fechaPublicacion'] . ")"; ?> </td>

		<td> <?php if($p['idUsuario'] == $_SESSION['id']) { echo "<a href='editar.php?e={$p['idPublicacion']}'> 
		Editar </a>"; } ?> </td>

		<td> <?php if($p['idUsuario'] == $_SESSION['id']) { echo "<a href='inicio.php?p={$p['idPublicacion']}'> 
		Eliminar </a>"; } ?> </td>
	</tr>

	<?php } ?>
</table>

<br>
<br>

<a href="index.php?salir=1">Cerrar Sesion</a>

</body>
</html>

<?php }
else
{
	header("Location: index.php");
} 

	?>