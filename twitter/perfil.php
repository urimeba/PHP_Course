<?php 

	session_start();
	
	#Mandamos llamar el archivo de conexion
	require_once('conex.php');

	$funciones = new Funciones();

	$conexion = $funciones->conectar();

	$user = $_GET['u']; 

	$verTweets = 	"SELECT tweet, fechaTweet
					FROM  tweet
					WHERE idUsuario = (SELECT idUsuario FROM usuario WHERE username = '{$user}');";


	$tweetsUser = $conexion->query($verTweets);

	$verFecha = "SELECT fechaUltimoTweet FROM usuario
				 WHERE username = '{$user}';";

	$fecha = $conexion->query($verFecha);

	$resultadoFecha = $fecha->fetch_assoc();
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Perfil de <?php echo $user; ?></title>
</head>
<body>

<h1>Perfil de <?php echo $user; ?></h1>

<h3>Ultimo Tweet: <?php echo $resultadoFecha['fechaUltimoTweet']; ?> </h3>

<br>



<?php while ($t = $tweetsUser->fetch_assoc())
{ 	

	echo $t['tweet'] . " (" . $t['fechaTweet'] . ") <br> ";

}

if (isset($_SESSION['id'])) 
{
	echo "<br> <br> <a href='timeline.php'> Volver al TimeLine</a> ";
}
else
{
	echo "<br> <br> <a href='index.php'> Inicia sesion o Registrate</a>";
}

?>



</body>
</html>