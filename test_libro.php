<?php 

	#Aqui mandamos llamar la clase libro, en el archivo especificado
	require_once('clase_libro.php');

	$libro = new libro("1984", "George Orwell", "Harvil Secker", "1ra edicion", true, 326);

	#Utilizamos los metodos del objeto calcu
	echo "<h1>Datos del libro</h1>";

	echo $libro->consultar();

	#Modificamos los datos del libro
	echo "Modificando el titulo del libro...<br>"; 
	$libro->settitulo("El Perfume");

	echo "Modificando el autor del libro...<br>";
	$libro->setautor("Patrick Suskind");

	echo "Modificando la editorial del libr...<br>";
	$libro->seteditorial("Alfaguara");

	echo "Modificando la edicion del libro...<br>";
	$libro->setedicion("3era");

	echo "Modificando la disponibilidad del libro...<br>";
	$libro->setdisponible(0);

	echo "Modificando las paginas del libro...<br>";
	$libro->setpaginas(350);

	echo "<br>";

	echo $libro->consultar();


 ?>