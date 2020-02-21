<?php
	class mradicados_ad {
		public function __construct() {}

		public function read($pdo) {
			$sql = "select * from mradicados";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute();
			
			$resultado = $sentencia -> fetchAll();
			$mradicados = array();
			
			foreach($resultado as $dato) {
				$objmradicados = new mradicados();
                $objmradicados -> set('radicado', $dato['radicado']);
                $objmradicados -> set('nomestudiante', $dato['nomestudiante']);
                $objmradicados -> set('frecepcion_consulta', $dato['frecepcion_consulta']);
                $objmradicados -> set('nomconsultante', $dato['nomconsultante']);
                $objmradicados -> set('fentrega_reporte', $dato['fentrega_reporte']);
                $objmradicados -> set('fevaluación', $dato['fevaluación']);
                $objmradicados -> set('primercorte', $dato['primercorte']);
                $objmradicados -> set('notaprimero', $dato['notaprimero']);
                $objmradicados -> set('segundocorte', $dato['segundocorte']);
                $objmradicados -> set('notasegundo', $dato['notasegundo']);
                $objmradicados -> set('tercercorte', $dato['tercercorte']);
                $objmradicados -> set('notatercero', $dato['notatercero']);
                $objmradicados -> set('tipoconsulta', $dato['tipoconsulta']);
                $objmradicados -> set('tema', $dato['tema']);
                $objmradicados -> set('subtema', $dato['subtema']);
                $objmradicados -> set('usuario', $dato['usuario']);
                $objmradicados -> set('fmodificacion', $dato['fmodificacion']);
                
				array_push($mradicados, $objmradicados);
				$objmradicados -> __destruct();
			}
			return $mradicados;
		}

		public function create($pdo, $objAux) {
			$radicado = $objAux -> get('radicado');
			$nomestudiante = $objAux -> get('nomestudiante');
			$frecepcion_consulta = $objAux -> get('frecepcion_consulta');
			$nomconsultante = $objAux -> get('nomconsultante');
			$fentrega_reporte = $objAux -> get('fentrega_reporte');
			$fevaluación = $objAux -> get('fevaluación');
			$primercorte = $objAux -> get('primercorte');
			$notaprimero = $objAux -> get('notaprimero');
			$segundocorte = $objAux -> get('segundocorte');
			$notasegundo = $objAux -> get('notasegundo');
			$tercercorte = $objAux -> get('tercercorte');
			$notatercero = $objAux -> get('notatercero');
			$tipoconsulta = $objAux -> get('tipoconsulta');
			$tema = $objAux -> get('tema');
			$subtema = $objAux -> get('subtema');
			$usuario = $objAux -> get('usuario');
			$fmodificacion = $objAux -> get('fmodificacion');
			$sql = "insert into mradicados (radicado, nomestudiante, frecepcion_consulta, nomconsultante, fentrega_reporte, fevaluación, primercorte, notaprimero, segundocorte, notasegundo, tercercorte, notatercero, tipoconsulta, tema, subtema, usuario, fmodificacion) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$sentencia = $pdo -> prepare($sql);
			$sentencia -> execute(array($radicado, $nomestudiante, $frecepcion_consulta, $nomconsultante, $fentrega_reporte, $fevaluación, $primercorte, $notaprimero, $segundocorte, $notasegundo, $tercercorte, $notatercero, $tipoconsulta, $tema, $subtema, $usuario, $fmodificacion));
		}

		public function delete($pdo,$objAux) {
			$codigo = $objAux -> get('radicado');
			$sql = "delete from mradicados where radicado = ?";
			$sentencia = $pdo -> prepare($sql);
            $sentencia -> execute(array($radicado));
		}

        public function update($pdo,$objAux) {
            $nombre = $objAux -> get('nombre');
			$mail = $objAux -> get('mail');
			$codigocurso = $objAux -> get('codigocurso');
			$codigo = $objAux -> get('radicado');
            
			$sql = "update mradicados set nombre = ?, mail = ?, codigocurso = ? where radicado=? ";
			$sentencia = $pdo -> prepare($sql);
            $sentencia -> execute(array($nombre, $mail, $codigocurso, $radicado));
		}

		public function __destruct() {}
	}
?>
