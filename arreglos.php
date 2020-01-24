<?php 

#Creamos un arreglo 

$numeros = array(10,20,30,40,50);

#Imprimimos los datos del arreglo

for ($i=0; $i <5 ; $i++) { 
	echo $numeros[$i];
echo "<br>";
}

#Preguntar cuantas posiciones tiene el arreglo
echo "El tamaño del arreglo es: " . sizeof($numeros) . "<br>";

echo "----------------------------------------------<br>";

$nombres = array("Carlos", "Alejandra", "Ivan", "Eduardo", "Gisel", "Nidia", "Axel", "Angel", "Pablo", "Antonio", "Uriel");

echo "El tamaño del arreglo es: " . sizeof($nombres) . "<br>";

for ($k=0; $k <sizeof($nombres) ; $k++) { 
	echo $nombres[$k] . "<br>";
}

echo "----------------------------------<br>";

#Cremos un arreglo que amacene un string, un string, un bool y un double
$datos = array(267792, "Uriel", "SOF11", true, 9.0 );

echo "DATOS DEL ALUMNO<br>";
echo "Expediente: {$datos[0]} <br>";
echo "Nombre: {$datos[1]} <br>";
echo "Plan: {$datos[2]} <br>";
echo "Genero: {$datos[3]} <br>";
echo "Promedio: {$datos[4]} <br>";

echo "-----------------------------------<br>";

$alumno = array('expediente' => 2677920 , 'nombre' => 'Uriel', 'plan' => 'SOF11', 'genero' => true, 'promedio' => 9.0 );
echo "Expediente: " . $alumno['expediente'] . "<br>";
echo "Nommbre: " . $alumno['nombre'] . "<br>";
echo "Plan: " . $alumno['plan'] . "<br>";
echo "Genero: " . $alumno['genero'] . "<br>";
echo "Promedio: " . $alumno['promedio'] . "<br>";



 ?>