<?php 

	#Mandamos llama la clase persona
	require_once('clase_persona.php');

	#Creamos un objeto de tipo persona
	$p = new Persona("Uriel", 21, "Estudiante");

	#Mandamos llamar los metodos del objeto Persona
	echo $p->saludar();
	echo $p->presentarse();
	echo $p->despedirse();	

 ?>