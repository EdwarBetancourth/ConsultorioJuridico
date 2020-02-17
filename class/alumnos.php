<?php
	class alumnos {
		private $codigo;
		private $nombre;
		private $mail;
		private $codigocurso;
		
		public function __construct() {}
		
		public function set($atributo, $valor) {
			$this -> $atributo = $valor;
		}
		
		public function get($atributo) {
			return $this -> $atributo;
		}
		
		public function __destruct() {}
	}
?>





