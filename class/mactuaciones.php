<?php
	class mactuaciones {
        private $radicado;
        private $actuacionesdesarrolladas;
        private $juzgadoentidad_tramita;
        private $radicado_juzgadoentidad;
        private $estadoactuacion;
        private $tresolucionactuacion;
        private $tformaalterna;
        private $resolucionactuacion;
        private $desempenoestudiante;
        private $estadoasunto;
        private $usuario;
        private $fmodificacion;
        		
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
