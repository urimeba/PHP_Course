<?php

	function Conectar()
	{
		$ServerName = "localhost";
		$User = "root";
		$Password = "";
		$Bd = "ControlVehicular";

		$Con = mysqli_connect($ServerName,$User,$Password,$Bd);
		return $Con;

	}
	
	function EjecutarConsulta($Con,$SQL)
	{
		$Query = mysqli_query($Con, $SQL) or die mysqli_error();
		return $Query;
	}
	
	function Desconectar($Con)
	{
		mysqli_close($Con);
	}

?>