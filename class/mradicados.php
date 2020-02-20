<?php
	class mradicados {
        private $radicado;
        private $nomestudiante;
        private $frecepcion_consulta;
        private $nomconsultante;
        private $fentrega_reporte;
        private $fevaluación;
        private $primercorte;
        private $notaprimero;
        private $segundocorte;
        private $notasegundo;
        private $tercercorte;
        private $notatercero;
        private $tipoconsulta;
        private $tema;
        private $subtema;
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
