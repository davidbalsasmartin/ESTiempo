<?php

	require_once "Conexion.php" ;

	class Usuario {

		private $usuario ;
		private $correo ;
		private $ciudad ;
		private $ciudad1 ;
		private $ciudad2 ;
		private $ciudad3 ;

		private function __construct() {
		}

		// Método mágico para obtener cualquier dato
		public function __get($prop){
			return $this->$prop ;
		}
		//Método mágico para setear cualquier dato
		public function __set($prop, $value) {
        	$this->{$prop} = $value;
    	}
	}