<?php 

class Funciones {

	public function conectar(){
		$host = "localhost";
		$user = "root";
		$pass = "";
		$database = "bd_taller";

		$conexion = new mysqli($host, $user, $pass, $database);

		if ($conexion->connect_errno > 0) {
			echo "Error conectando a la BD<br>";
		}
		else
		{
			return $conexion;
		}
	}
}


 ?>