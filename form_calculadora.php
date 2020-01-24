<!DOCTYPE html>
<html>
<head>
	<title>Calculadora</title>
</head>
<body>

<h1>Calculadora</h1>

<?php 

	#Si se envia el formulario
	if (isset($_GET[btnEnviar])) {
	 	require_once('clase_calculadora.php');

	 	$Calculadora=new Calculadora();

	 	$num1=$_GET['valor1'];
	 	$num2=$_GET['valor2'];
	 	$operacion=$_GET['operacion'];

	 	switch ($operacion) {
	 		case 'suma':
	 		#sumar
	 		echo "{$num1} + {$num2} = {$Calculadora->sumar($num1, $num2)}<br>";
	 		break;

	 		case 'resta':
	 		#restar
	 		echo "{$num1} - {$num2} = {$Calculadora->restar($num1, $num2)}<br>";
	 		break;

	 		case 'multi':
			#multiplicar
			echo "{$num1} * {$num2} = {$Calculadora->multiplicar($num1, $num2)}<br>";
	 			break;
	 		
	 		case 'div':
	 			#dividir
	 		echo "{$num1} / {$num2} = {$Calculadora->dividir($num1, $num2)}<br>";
	 			break;

	 		default:
	 		echo "Operacion invalida<br>";
	 		break;
	 	}
	 } 

 ?>

<form action="#" method="GET">
	Valor 1: <input type="number" name="valor1"><br>
	Operacion: <select name="operacion">
				<option value="suma"> + </option>
				<option value="resta"> - </option>
				<option value="multi"> * </option>
				<option value="div"> / </option>
				</select><br>
	Valor 2: <input type="number" name="valor2"><br>
	<input type="submit" name="btnEnviar" value="Calcular"><br>


</form>

</body>
</html>