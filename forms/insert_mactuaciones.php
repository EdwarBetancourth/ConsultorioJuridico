<?php
        include('../class/conexion.php');
        include('../class/mactuaciones.php');
        include('../class/mactuaciones_ad.php');
        
        $mactuaciones = array();
        
        $objConexion = new conexion();
        $objConexion -> abrir_conexion();
        
        $objmactuacionesAD = new mactuaciones_ad();
        
        if(array_key_exists('radicado', $_POST)) {
            $objmactuaciones = new mactuaciones();
            $objmactuaciones -> set('radicado', $_POST['radicado']);
            $objmactuaciones -> set('actuacionesdesarrolladas', $_POST['actuacionesdesarrolladas']);
            $objmactuaciones -> set('juzgadoentidad_tramita', $_POST['juzgadoentidad_tramita']);
            $objmactuaciones -> set('radicado_juzgadoentidad', $_POST['radicado_juzgadoentidad']);
            $objmactuaciones -> set('estadoactuacion', $_POST['estadoactuacion']);
            $objmactuaciones -> set('tresolucionactuacion', $_POST['tresolucionactuacion']);
            $objmactuaciones -> set('tformaalterna', $_POST['tformaalterna']);
            $objmactuaciones -> set('resolucionactuacion', $_POST['resolucionactuacion']);
            $objmactuaciones -> set('desempenoestudiante', $_POST['desempenoestudiante']);
            $objmactuaciones -> set('estadoasunto', $_POST['estadoasunto']);
            $objmactuaciones -> set('usuario', $_POST['usuario']);
            $objmactuaciones -> set('fmodificacion', $_POST['fmodificacion']);
            $objmactuacionesAD -> create($objConexion -> pdo, $objmactuaciones);
            $objmactuaciones -> __destruct();
            header('Location: ../agregarActuacion.php');
        }
    ?>
