<?php 

session_start();

$usuario = $_SESSION['user'];

if (isset($_SESSION['id'])) 
{
	#Mandamos llamar el archivo de CONEXION
	require_once('conex.php');

	$funciones = new Funciones();

	$conexion = $funciones->conectar();

	#Si el usuario edita
	if (isset($_POST['btnActualizar'])) 
	{
		$publicacion=$_POST['nueva'];
		$editar = "UPDATE publicacion 
					SET publicacion='$publicacion' 
					WHERE idPublicacion={$_GET['e']};";

		if ($conexion->query($editar)) 
		{
			echo "Actualizacion realizada correctamente!";
		}
		else
		{
			echo $conexion->error. "<br>";
			echo $editar;
		}
	}	


	#Buscamos la publicacion en la BD
	$publicaciones= "SELECT publicacion
					FROM publicacion
					WHERE idPublicacion = {$_GET['e']};";

	$publicacion=$conexion->query($publicaciones);
	$p=$publicacion->fetch_assoc();


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>ACTUALIZAR </title>
</head>
<body>


<h2>Actualizar Publicacion</h2>

<H3>Publicacion actual:</H3>
<tr>
	<td> <?php echo $p['publicacion']; ?> </td>
</tr>

<form action="#" method="POST">
	<input type="hidden" value=" <?php echo $_GET['e']; ?> " name="idPub"><br>
	<h3>por la siguiente: </h3> <br>
	<textarea name="nueva" placeholder="Escribe la publicacion actualizada"></textarea><br>
	<input type="submit" name="btnActualizar" value="Actualizar">

</form>
<br> <br>
<a href="perfil.php?u=<?php echo $usuario; ?>">Volver a Mi Perfil</a>


</body>
</html>

<?php 
}
else
{
	header("Location: index.php");
}

 ?>