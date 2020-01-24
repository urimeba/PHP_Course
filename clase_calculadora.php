<?php 

	class Calculadora {
		#Atributos
		public $marca;
		public $modelo;
		public $fuenteEnergia;

		#Constructor
		public function __construct ($mar = 'Casio', $mod = 'XT-1000', $fe = 'Bateria' ) {
			$this->marca = $mar;
			$this->modelos = $mod;
			$this->fuenteEnergia = $fe;
		}

		#Metodos GET
		public function getmarca(){
			return $this->marca;
		}

		public function getmodelo(){
			return $this->modelo;
		}

		public function getfuenteEnergia(){
			return $this->fuenteEnergia;
		}

		#Metodos
		public function sumar($a, $b) {
			return $a + $b;
		}

		public function restar ($a, $b) {
			return $a - $b;
		}

		public function multiplicar ($a, $b) {
			return $a * $b;
		}

		public function dividir ($a, $b) {
			if ($b !=0){
			return $a / $b; //regresamos un double
		}else{
			//regresamos un string 
			return "No se puede dividir entre cero<br>";
		}
		}

	}
 ?>