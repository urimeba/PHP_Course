<?php 

#Imprimir los numeros del cero al nueve con for
echo "Numeros del 0 al 9 con for<br>";

for ($i=0; $i <10 ; $i++) { 
	echo $i . "<br>";
}

echo "-------------<br>";

echo "Numeros del 100 al 0, de 10 en 10 <br>";

for ($j=100; $j>=0  ; $j=$j-10) { 
	echo $j . "<br>";
}

echo "-------------<br>";

echo "Numeros del 0 al 9 con un While <br>";
$k=0;
while ($k<10) {
	echo $k . "<br>";
	$k++;
}

echo "-------------<br>";

$m=100;
while ($m>= 0) {
	echo $m . "<br>";
	$m=$m-10;
}



 ?>