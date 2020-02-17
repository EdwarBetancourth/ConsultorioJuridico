<?php
        include('../class/conexion.php');
        include('../class/curso.php');
        include('../class/curso_ad.php');
        
        $Curso = array();
        
        $objConexion = new conexion();
        $objConexion -> abrir_conexion();
        
        $objCursoAD = new curso_ad();

        if(array_key_exists('codigo', $_POST)) {
            $objCurso = new curso();
            $objCurso -> set('codigo', $_POST['codigo']);
            $objCursoAD -> delete($objConexion -> pdo, $objCurso);
            $objCurso -> __destruct();
        }
        
        if(array_key_exists('nombrecurso', $_POST)) {
            $objCurso = new curso();
            $objCurso -> set('nombrecurso', $_POST['nombrecurso']);
            $objCursoAD -> create($objConexion -> pdo, $objCurso);
            $objCurso -> __destruct();
            
        header('Location: ../index.php');
        }
    ?>