<?php 

class Persona {

	#Definimos los atributos de la clase
	public $nombre;
	public $edad;
	public $profesion;

	#Definimos el constructor
	public function __construct($n, $e, $p){
		#This es una palabra reservada que sirve para asignar nombres a las variables
		$this->nombre = $n;
		$this->edad = $e;
		$this->profesion = $p;
	}

	public function saludar(){
		return "Hola a todos!<br>";
	}

	public function despedirse(){
		return "Adios!<br>";
	}

	public function presentarse(){
		return "Hola, mi nombre es {$this->nombre}, tengo {$this->edad} años y soy {$this->profesion}. <br>";
	}
}

 ?>