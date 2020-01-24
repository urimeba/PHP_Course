<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<?php 

#Si el usuario envia el formulario
if (isset($_POST['btnEnviar'])) {
	$userLogin="Uriel";
	$passLogin="raton";

	$userForm=$_POST['usuario'];
	$passForm=$_POST['pass'];

	if ($userForm==$userLogin && $passForm==$passLogin){
		#Si los datos son correctos, redigirimos al usuario a la pagina test_login.php
		header('Location:test_login.php?user=Uriel');
	}
	else{
		echo "Usuario o contraseña incorrectos <br>";
	}
	
}

 ?>

<h1>Ingresa tus Datos</h1>

<form method="POST" action="#">
	Usuario: <input type="text" name="usuario"><br>
	<br>
	Contraseña: <input type="password" name="pass"><br>
	<br>
	<input type="submit" name="btnEnviar" placeholder="Enviar" value="Enviar"><br> <!-- Etiqueta value es lo que va a llevar escrito el boton -->
</form>




</body>
</html>