<?php 

#Habilitamos las variales de Sesion
session_start();

#Aqui cerramos la sesion
if (isset($_GET['salir'])) 
{
	if ($_GET['salir'] == 1)  
	{
		#Limpiamos las variables de sesion
		session_unset();
	}
}

#Mandamos llamar el archivo de CONEXION
require_once('conex.php');

#Instanciamos la CLASE FUNCIONES
$funciones = new Funciones();

#Mandamos llamar el METODO CONECTAR
$conexion = $funciones->conectar();

#INICIO DE SESION
if (isset($_POST['btnLogin'])) 
{
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$select = "SELECT COUNT(*) AS total
				FROM user
				WHERE username = '{$user}'
				AND pass = md5('{$pass}'); ";

	#Mandamos la CONSULTA A LA BD
	$resultado = $conexion->query($select);

	#Recuperamos el resultado de la Consulta
	$total = $resultado->fetch_assoc();

		$total['total'];

		if ($total['total'] == 0) 
		{
			echo "Usuario o Contraseña incorrectos";
		}
		else
		{
			#Buscamos los DATOS DEL USUARIO
			$verUser = "SELECT idUsuario, username
						FROM user
						WHERE username = '{$user}'
						AND pass = md5('{$pass}'); ";


			#Mandamos esta anterior CONSULTA A LA BD
			$resUser = $conexion->query($verUser);

			#Recuperamos el resultado de la CONSULTA
			$res = $resUser->fetch_assoc();

			$_SESSION['id']= $res['idUsuario'];
		
			$_SESSION['user']=$res['username'];

			#Redigirimos a la pagina timeline.php
			header("Location: perfil.php?u={$_SESSION['user']}");

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

	if ($pass1==$pass2) 
	{
		#FUNCION INSERT PARA CREAR EL USUARIO
		$insert = " INSERT INTO user(username, pass, correo, genero, fechaRegistro) VALUES('{$username}', md5('{$pass1}'), '{$correo}', '{$genero}', (SELECT curdate() FROM dual));";

		#Mandamos la CONSULTA A LA BD
		if($conexion->query($insert))
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
		echo "Las contraseñas no coinciden";
	}

}

 ?>


<!DOCTYPE html>
<html>
<head>
<meta>
	<title>FACEBOOK</title>
</head>
<body>

<h1>Bienvenido a Facebook</h1>

	<h3>Inicia Sesion</h3>	
	<form action="#" method="POST">
	Usuario: <input type="text" name="user"><br>
	Contraseña: <input type="password" name="pass"><br>
	<input type="submit" name="btnLogin" value="Iniciar Sesion"><br>
</form>

<h3>Si no tienes cuentra, Registrate...</h3>

<form action="#" method="POST">
	Usuario: <input type="text" name="username"><br>
	Contraseña: <input type="password" name="pass1"><br>
	Confirmar contraseña: <input type="password" name="pass2"><br>
	Correo electronico: <input type="email" name="correo"><br>
	
	Genero:  <br>
	<input type="radio" name="genero" value="1"> Hombre <br>
	<input type="radio" name="genero" value="0"> Mujer <br>

	<input type="submit" name="btnRegistrar" value="Registrar"><br>


</form>


</body>
</html>