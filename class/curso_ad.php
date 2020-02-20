<?php
	class curso_ad {
		public function __construct() {}
		
		public function read($pdo) {
			$sql = "select * from cursos";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute();
			
			$resultado = $sentencia -> fetchAll();
			$Curso = array();
			
			foreach($resultado as $dato) {
				$objCurso = new curso();
				$objCurso -> set('codigo', $dato['codigo']);
				$objCurso -> set('nombrecurso', $dato['nombrecurso']);
				array_push($Curso, $objCurso);
				$objCurso -> __destruct();
			}
			return $Curso;
		}
		
		public function create($pdo, $objAux) {
			$nombrecurso = $objAux -> get('nombrecurso');

			$sql = "insert into cursos (nombrecurso) values (?)";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute(array($nombrecurso));
		}

		public function __destruct() {}
	}
?>






