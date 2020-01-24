<?php 

	#Mandamos llamar la clase calculadora
	require_once('clase_calculadora.php');

	#Creamos un objeto del tipo Calculadora
	$calcu = new Calculadora("CASIO", "12x", "Baterias");

	#Utilizamos los metodos del objeto calcu
	echo "3 + 1 es " . $calcu->sumar(3,1);
	echo "<br>";

	echo "9 - 4 es " . $calcu->restar(9,4);
	echo "<br>";

	echo "5 * 6 es " . $calcu->multiplicar(5,6);
	echo "<br>";

	echo "90 / 9 es " . $calcu->dividir(90,9);
	echo "<br>";


 ?>