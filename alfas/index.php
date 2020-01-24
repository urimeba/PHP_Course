<?php 
#Mandamos llamar las variales de SESION que interconecta los archivos PHP
session_start();


#Mandamos llamar el archivo de conexion a la base de datos
require_once('conex.php');

#Instaciamos la clase funciones
$funciones = new Funciones();

#Mandamos llamar el metodo Conectar de la clase Funciones
$conexion = $funciones->conectar();

#INICIO DE SESION
if(isset($_POST['btnLogin']))
{
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$select = "SELECT COUNT(*) AS total
				FROM usuario
				WHERE username='{$user}'
				AND pass=md5('{$pass}');";

	$resultado=$conexion->query($select);

	$total = $resultado->fetch_assoc();

	if ($total['total'] == 0) 
	{
		echo "Contraseña o usuario incorrectos";
	}
	else
	{
		#Tomaremos el ID y el USERNAME para tenerlos guardados en variables a traves de los archivos PHP
		$selectuser = " SELECT idUsuario, username
						FROM usuario
						WHERE username='{$user}'
						AND pass=md5('{$pass}'); ";

		$resUser = $conexion->query($selectuser);

		$res = $resUser->fetch_assoc();

		$_SESSION['id'] = $res['idUsuario'];
		$_SESSION['username'] = $res['username'];

		#Mandamos a la pagina de Funciones de Cine
		header("Location: funciones.php");

	}
}


#REGISTRO DE USUARIO
if (isset($_POST['btnRegistrar'])) 
{
	$username = $_POST['username'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	$correo = $_POST['correo'];
	$genero = $_POST['genero'];

	if ($pass1 == $pass2) 
	{

		$insert = "INSERT INTO usuario(username, pass, correo, genero, fechaRegistro)
					VALUES ('{$username}', md5('{$pass1}'), '{$correo}', '{$genero}', (SELECT curdate() FROM dual));";

		if($conexion->query($insert)) 
		{
			echo "Usuario registrado correctamente";
		}
		else
		{
			echo "ERROR: " . $conexion->error . "<br>";
		}
	}
	else
	{
		echo "Las contraseñas no coinciden";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Bievenido a Cine</title>
</head>
<body>

<h1>Bienvenido a Cine Online</h1>

<h2>Para comprar tus boletos inicia sesion</h2>

<form action="#" method="POST">
	Usuario: <input type="text" name="user"><br>
	Contraseña: <input type="password" name="pass"><br>
	<input type="submit" name="btnLogin" value="Inicia Sesion">
</form>

<h2>Si no tienes cuenta, registrate</h2>
<form action="#" method="POST">
	Usuario: <input type="text" name="username"><br>
	Contraseña: <input type="password" name="pass1"><br>
	Confirma la contraseña: <input type="password" name="pass2"><br>
	Correo electronico: <input type="email" name="correo"><br>
	Genero: <br>
	<input type="radio" name="genero" value="1"> Hombre
	<input type="radio" name="genero" value="0"> Mujer
	<br>
	<input type="submit" name="btnRegistrar" value="Registrate">
</form>

</body>
</html>