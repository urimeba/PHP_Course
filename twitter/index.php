	<?php 

#Habilitamos el uso de variables de sesion
session_start();

#Aqui mandamos cerrar la sesion
if (isset($_GET['salir'])) 
{

	if($_GET['salir'] == 1)
	{
		#Liberamos el espacio de las variables de sesion, NO A BORRARLAS
		session_unset();
	}

}

#Mandamos llamar el archivo de conexion
require_once('conex.php');

#Instanciar la clase funciones
$funciones = new Funciones();

#Mandamos llamar el metodo conectar() del objeto funciones
$conexion = $funciones->conectar();

#INICIO DE SESION
if (isset($_POST['btnLogin']))
{
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$select = "SELECT COUNT(*) AS total
				FROM usuario
				WHERE username= '{$user}' 
				AND pass = md5('{$pass}'); " ;


	#Mandamos la consulta a la BD. PASO #3
	$resultado = $conexion->query($select);

	#Recuperamos el resultado de la consulta
	$total = $resultado->fetch_assoc();

	$total['total'];

	if ($total['total'] == 0)
	{
		echo "Usuario o contraseña incorrectos <br>";
	}
	else
	{
		#echo "Puedes iniciar sesion <br>";

		#Aqui buscamos los datos del usuario que inicio sesion
		$verUser="SELECT idUsuario, username FROM usuario
					WHERE username= '{$user}'
					AND pass=md5('{$pass}');";


		#Mandamos la consulta a la base de datos
		$resUser= $conexion->query($verUser);

		#Recuperamos el resultado de la consulta
		$res = $resUser->fetch_assoc();

		
		$_SESSION['id']= $res['idUsuario'];
		
		$_SESSION['user']=$res['username'];

		#echo "ID> {$_SESSION['id']} <br>";
		#echo "Username> {$_SESSION['user']} <br>";

		#Redigirimos a la pagina timeline.php
		header("Location: timeline.php");
		
	}

}

#REGISTRO DEL USUARIO
if (isset($_POST['btnRegistrar'])) 
{
	$username = $_POST['username'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	$correo = $_POST['correo'];
	$genero = $_POST['genero'];

	if ($pass1 == $pass2) 
	{
		#Construimos la funcion INSERT para dar de alta al usuario (Construimos la consulta para la BD. PASO 2)
		$insert = "INSERT INTO usuario(username, pass, fechaRegistro, correo, genero) VALUES('{$username}', md5('{$pass1}'), (SELECT curdate() FROM dual), '{$correo}', {$genero} );";

		#Mandar la consulta a la BD (Aqui le decimos que se conecte a la BD y ejecute la variable INSERT. PASO 3)
		IF($conexion->query($insert))
		{
			echo "Usuario registrado correctamente!<br>";
		}
		else
		{
			echo "ERROR: " . $conexion->error . "<br>";
		}
	}
	else
	{
		echo "Las contraseñas no coinciden <br>";
	}

}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido a Twitter</title>
</head>
<body>

<h1>Bienvenido a Twitter</h1>

<h2>Inicia Sesión</h2>

<form action="#" method="POST">
	Username: <input type="text" name="user"> <br>
	Contraseña: <input type="password" name="pass"> <br>
	<input type="submit" name="btnLogin" value="Iniciar Sesión"> <br>
</form>



<h2>...o si no tienes cuenta, Regístrate</h2>

<form action="#" method="POST">
	Username: <input type="text" name="username"><br>
	Contraseña: <input type="password" name="pass1"><br>
	Confirmar contraseña: <input type="password" name="pass2"><br>
	Correo electronico: <input type="email" name="correo"><br>
	
	Genero: <br>
	<input type="radio" name="genero" value="1"> Hombre
	<input type="radio" name="genero" value="0">Mujer <br>

	<input type="submit" name="btnRegistrar" value="Registrar"><br>


</form>

</body>
</html>
