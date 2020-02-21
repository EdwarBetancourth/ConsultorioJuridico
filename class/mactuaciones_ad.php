<?php
	class mactuaciones_ad {
		public function __construct() {}

		public function read($pdo) {
			$sql = "select * from mactuaciones";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute();
			
			$resultado = $sentencia -> fetchAll();
			$mactuaciones = array();
			
			foreach($resultado as $dato) {
				$objmactuaciones = new mactuaciones();
                $objmactuaciones -> set('radicado', $dato['radicado']);
                $objmactuaciones -> set('nomestudiante', $dato['nomestudiante']);
                $objmactuaciones -> set('frecepcion_consulta', $dato['frecepcion_consulta']);
                $objmactuaciones -> set('nomconsultante', $dato['nomconsultante']);
                $objmactuaciones -> set('fentrega_reporte', $dato['fentrega_reporte']);
                $objmactuaciones -> set('fevaluación', $dato['fevaluación']);
                $objmactuaciones -> set('primercorte', $dato['primercorte']);
                $objmactuaciones -> set('notaprimero', $dato['notaprimero']);
                $objmactuaciones -> set('segundocorte', $dato['segundocorte']);
                $objmactuaciones -> set('notasegundo', $dato['notasegundo']);
                $objmactuaciones -> set('tercercorte', $dato['tercercorte']);
                $objmactuaciones -> set('notatercero', $dato['notatercero']);
                $objmactuaciones -> set('tipoconsulta', $dato['tipoconsulta']);
                $objmactuaciones -> set('tema', $dato['tema']);
                $objmactuaciones -> set('subtema', $dato['subtema']);
                $objmactuaciones -> set('usuario', $dato['usuario']);
                $objmactuaciones -> set('fmodificacion', $dato['fmodificacion']);
                
				array_push($mactuaciones, $objmactuaciones);
				$objmactuaciones -> __destruct();
			}
			return $mactuaciones;
		}

		public function create($pdo, $objAux) {
			$radicado = $objAux -> get('radicado');
			$actuacionesdesarrolladas = $objAux -> get('actuacionesdesarrolladas');
			$juzgadoentidad_tramita = $objAux -> get('juzgadoentidad_tramita');
			$radicado_juzgadoentidad = $objAux -> get('radicado_juzgadoentidad');
			$estadoactuacion = $objAux -> get('estadoactuacion');
			$tresolucionactuacion = $objAux -> get('tresolucionactuacion');
			$tformaalterna = $objAux -> get('tformaalterna');
			$resolucionactuacion = $objAux -> get('resolucionactuacion');
			$desempenoestudiante = $objAux -> get('desempenoestudiante');
			$estadoasunto = $objAux -> get('estadoasunto');
			$usuario = $objAux -> get('usuario');
			$fmodificacion = $objAux -> get('fmodificacion');
			$sql = "insert into mactuaciones (radicado, actuacionesdesarrolladas, juzgadoentidad_tramita, radicado_juzgadoentidad, estadoactuacion, tresolucionactuacion, tformaalterna, resolucionactuacion, desempenoestudiante, estadoasunto, usuario, fmodificacion) values (?,?,?,?,?,?,?,?,?,?,?,?)";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute(array($radicado, $actuacionesdesarrolladas, $juzgadoentidad_tramita, $radicado_juzgadoentidad, $estadoactuacion, $tresolucionactuacion, $tformaalterna, $resolucionactuacion, $desempenoestudiante, $estadoasunto, $usuario, $fmodificacion));
		}

		public function delete($pdo,$objAux) {
			$codigo = $objAux -> get('radicado');
			$sql = "delete from mactuaciones where radicado = ?";
			$sentencia = $pdo -> prepare($sql);
            $sentencia -> execute(array($radicado));
		}

        public function update($pdo,$objAux) {
            $nombre = $objAux -> get('nombre');
			$mail = $objAux -> get('mail');
			$codigocurso = $objAux -> get('codigocurso');
			$codigo = $objAux -> get('radicado');
            
			$sql = "update mactuaciones set nombre = ?, mail = ?, codigocurso = ? where radicado=? ";
			$sentencia = $pdo -> prepare($sql);
            $sentencia -> execute(array($nombre, $mail, $codigocurso, $radicado));
		}

		public function __destruct() {}
	}
?>
