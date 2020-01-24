<?php 

class libro {
	#Atributos
	public $titulo;
	public $autor;
	public $editorial;
	public $edicion;
	public $disponible;
	public $paginas;

	#Constructor
	public function __construct ($tit, $aut, $edit, $edic, $dispo, $pag) {
		$this->titulo = $tit;
		$this->autor = $aut;
		$this->editorial = $edit;
		$this->edicion = $edic;
		$this->disponible = $dispo;
		$this->paginas = $pag;
	}

	public function consultar(){
		return "Título: {$this->gettitulo()}<br>".
				"Autor: {$this->getautor()}<br>".
				"Editorial: {$this->geteditorial()}<br>".
				"Edicion: {$this->getedicion()}<br>".
				"Disponible: {$this->getdisponible()}<br>".
				"Páginas: {$this->getpaginas()}<br>";
	}

	public function prestar (){

	}

	public function devolver(){

	}



	#Metodos GET
	public function gettitulo(){
		return $this->titulo;
	}

	public function getautor(){
		return $this->autor;
	}
	public function geteditorial(){
		return $this->editorial;
	}

	public function getedicion(){
		return $this->edicion;
	}

	public function getdisponible(){
		return $this->disponible;
	}

	public function getpaginas(){
		return $this->paginas;
	}

	
	#Metodos SET
	public function settitulo($nuevotitulo){
		$this->titulo = $nuevotitulo;
	}

	public function setautor($nuevoautor){
		$this->autor = $nuevoautor;
	}

	public function seteditorial($nuevoeditorial){
		$this->editorial = $nuevoeditorial;
	}

	public function setedicion($nuevoedicion){
		$this->edicion = $nuevoedicion;
	}

	public function setdisponible($nuevodisponible){
		$this->disponible = $nuevodisponible;
	}

	public function setpaginas($nuevopaginas){
		$this->paginas = $nuevopaginas;
	}

}


 ?>