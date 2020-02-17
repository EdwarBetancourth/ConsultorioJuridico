<?php
        include('../class/conexion.php');
        include('../class/Alumnos.php');
        include('../class/Alumnos_ad.php');
        
        $Alumnos = array();
        
        $objConexion = new conexion();
        $objConexion -> abrir_conexion();
        
        $objAlumnosAD = new alumnos_ad();

        if(array_key_exists('codigo', $_POST) && array_key_exists('nombre', $_POST)) {
            $objAlumnos = new alumnos();
            $objAlumnos -> set('codigo', $_POST['codigo']);
            $objAlumnos -> set('nombre', $_POST['nombre']);
            $objAlumnos -> set('mail', $_POST['mail']);
            $objAlumnos -> set('codigocurso', $_POST['codigocurso']);
            
            $objAlumnosAD -> update($objConexion -> pdo, $objAlumnos);
            $objAlumnos -> __destruct();
            header('Location: ../index.php');
        }
        
    ?>