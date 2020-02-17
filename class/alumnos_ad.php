<?php
	class alumnos_ad {
		public function __construct() {}
		
		public function read($pdo) {
			$sql = "select alumnos.codigo,nombre,mail,codigocurso,nombrecurso from alumnos inner join cursos on alumnos.codigocurso = cursos.codigo order by alumnos.codigo";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute();
			
			$resultado = $sentencia -> fetchAll();
			$alumnos = array();
			
			foreach($resultado as $dato) {
				$objAlumnos = new alumnos();
				$objAlumnos -> set('codigo', $dato['codigo']);
				$objAlumnos -> set('nombre', $dato['nombre']);
				$objAlumnos -> set('mail', $dato['mail']);
				$objAlumnos -> set('codigocurso', $dato['codigocurso']);
				$objAlumnos -> set('nombrecurso', $dato['nombrecurso']);
				array_push($alumnos, $objAlumnos);
				$objAlumnos -> __destruct();
			}
			return $alumnos;
		}
		
		public function create($pdo, $objAux) {
			$nombre = $objAux -> get('nombre');
			$mail = $objAux -> get('mail');
			$codigocurso = $objAux -> get('codigocurso');
			
			$sql = "insert into alumnos (nombre,mail,codigocurso) values (?,?,?)";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute(array($nombre, $mail, $codigocurso));
		}

		public function delete($pdo,$objAux) {
			$codigo = $objAux -> get('codigo');
			$sql = "delete from alumnos where codigo=? ";
			$sentencia = $pdo -> prepare($sql);
            $sentencia -> execute(array($codigo));
		}
		
        public function update($pdo,$objAux) {
            $nombre = $objAux -> get('nombre');
			$mail = $objAux -> get('mail');
			$codigocurso = $objAux -> get('codigocurso');
			$codigo = $objAux -> get('codigo');
            
			$sql = "update alumnos set nombre = ?, mail = ?, codigocurso = ? where codigo=? ";
			$sentencia = $pdo -> prepare($sql);
            $sentencia -> execute(array($nombre, $mail, $codigocurso, $codigo));
		}

		public function __destruct() {}
	}
?>






