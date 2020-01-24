<?php 

session_start();

$usuario=$_SESSION['user'];

require_once('conex.php');
 
$funciones = new Funciones();

$conexion = $funciones->conectar();


#Esta funcion sirve para cuando el USUARIO PUBLICA
	if (isset($_POST['btnPublicacion'])) 
	{
		$idUser = $_POST['idUser'];
		$publicacion = $_POST['publicacion'];
		$perfil = $_POST['perfil'];

		#Creamos la consulta para mandar la PUBLICACION A LA BD
		$insert = "INSERT INTO publicacion(publicacion, idUsuario, perfilDe) VALUES ('{$publicacion}', '{$idUser}', '{$perfil}'); ";

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

#Esta funcion es para cuando el usuario elimina
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
	

$user = $_GET['u'];

$verPublicaciones = "SELECT idPublicacion, publicacion, fechaPublicacion
					FROM publicacion
					WHERE perfilDe = (SELECT username FROM user WHERE username = '{$user}')
					ORDER BY fechaPublicacion DESC;";


	$publicacionesUsuario = $conexion->query($verPublicaciones);

$verFecha = "SELECT fechaUltimaPublicacion FROM user
			WHERE username = '{$user}';";

	$fecha = $conexion->query($verFecha);

	$resultadoFecha=$fecha->fetch_assoc();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Perfil de <?php echo $user; ?> </title>
</head>
<body>

<h1>Perfil de: <?php echo $user; ?></h1>

<h4>Ultima publicacion: <?php echo $resultadoFecha['fechaUltimaPublicacion']; ?> </h5>

<?php 
if ($_SESSION['user']==$user) 
{
	echo "<h2>Realiza una publicacion en tu Muro</h2>";

}
else
{
	echo "<h2>Realiza una publicacion en el Muro de $user</h2>";
	
}

 ?>

<form action="perfil.php?u=<?php echo $user;?>" method="POST">
	<input type="hidden" name="idUser" value="<?php echo $_SESSION['id'];?>"> <br>
	<input type="hidden" name="perfil" value="<?php echo $_GET['u']; ?>"> 
	<textarea name="publicacion"></textarea><br>
	<input type="submit" name="btnPublicacion" value="Publicar">
</form>


<h4>Publicaciones en el muro de <?php echo $user; ?></h4>
<?php while ($p = $publicacionesUsuario->fetch_assoc())
{

$publicador = "SELECT user.username
					FROM user, publicacion
					WHERE publicacion.idPublicacion = '{$p['idPublicacion']}'
					AND publicacion.idUsuario = user.idUsuario";

$publi = $conexion->query($publicador);

$pub=$publi->fetch_assoc();

	echo $p['publicacion'] . "<br>";
	echo "Publicado el: " . $p['fechaPublicacion'] . " <br>";
	echo "de " . $pub['username'] . "<br>";
	if($pub['username']==$usuario) {echo "<a href='editar.php?e={$p['idPublicacion']}'>Editar </a> <br>";}
	if($pub['username']==$usuario) {echo "<a href='perfil.php?u={$user}&p={$p['idPublicacion']}'>Eliminar </a>";}
	echo "<br> <br>";
}

echo "<h4>Tus amigos de Facebook:</h4>";
#Aqui mandamos mostrar los usuarios
$usuarios = "SELECT username
FROM user;";

$users=$conexion->query($usuarios);


while ($us=$users->fetch_assoc()) 
{
	echo "<a href=perfil.php?u={$us['username']}>@".$us['username'] . "</a>". "<br>";
}

echo "<br> <br>";
if ($_SESSION['user']==$user) 
{
	
}
else
{
	echo "<a href=perfil.php?u={$_SESSION['user']}>Volver a Mi Perfil</a> ";
}



if (isset($_SESSION['id'])) 
{
	echo "<br> <a href='index.php?salir=1'> Cerrar Sesion </a>";
}
else
{
	echo "<br> <br> <a href='index.php'> Inicia Sesion o Registrate </a>";
}


 ?>

</body>
</html>