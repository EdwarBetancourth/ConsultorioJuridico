<?php
        include('../class/conexion.php');
        include('../class/mradicados.php');
        include('../class/mradicados_ad.php');
        
        $mradicados = array();
        
        $objConexion = new conexion();
        $objConexion -> abrir_conexion();
        
        $objmradicadosAD = new mradicados_ad();
        
        if(array_key_exists('radicado', $_POST)) {
            $objmradicados = new mradicados();
            $objmradicados -> set('radicado', $_POST['radicado']);
            $objmradicados -> set('nomestudiante', $_POST['nomestudiante']);
            $objmradicados -> set('frecepcion_consulta', $_POST['frecepcion_consulta']);
            $objmradicados -> set('nomconsultante', $_POST['nomconsultante']);
            $objmradicados -> set('fentrega_reporte', $_POST['fentrega_reporte']);
            $objmradicados -> set('fevaluación', $_POST['fevaluación']);
            $objmradicados -> set('primercorte', $_POST['primercorte']);
            $objmradicados -> set('notaprimero', $_POST['notaprimero']);
            $objmradicados -> set('segundocorte', $_POST['segundocorte']);
            $objmradicados -> set('notasegundo', $_POST['notasegundo']);
            $objmradicados -> set('tercercorte', $_POST['tercercorte']);
            $objmradicados -> set('notatercero', $_POST['notatercero']);
            $objmradicados -> set('tipoconsulta', $_POST['tipoconsulta']);
            $objmradicados -> set('tema', $_POST['tema']);
            $objmradicados -> set('subtema', $_POST['subtema']);
            $objmradicados -> set('usuario', $_POST['usuario']);
            $objmradicados -> set('fmodificacion', $_POST['fmodificacion']);
            $objmradicadosAD -> create($objConexion -> pdo, $objmradicados);
            $objmradicados -> __destruct();
            echo '<script> alert("la fecha es'.$_POST['frecepcion_consulta'].'"); </script>';
            //header('Location: ../index.php');
        }
    ?>
