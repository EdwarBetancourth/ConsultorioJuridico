<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualización de Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="StyleSheet" href="style/style.css" type="text/css" media=screen>

</head>

<body>
    <?php
        include('../class/conexion.php');
        include('../class/alumnos.php');
        include('../class/alumnos_ad.php');
        include('../class/curso.php');
        include('../class/curso_ad.php');
        
        $alumnos = array();
        $cursos = array();
        
        $objConexion = new conexion();
        $objConexion -> abrir_conexion();
        
        $objalumnosAD = new alumnos_ad();
        $objcursosAD = new curso_ad();

        $codigo = 0;
        $nombre = "";
        $mail = "";
        $codigocurso = "";
    
        if(array_key_exists('nombre',$_POST)) {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $mail = $_POST['mail'];
            $codigocurso = $_POST['codigocurso'];
        }
        $cursos = $objcursosAD -> read($objConexion -> pdo);
    ?>
        <br>
        <div class="container" style="width: 50%;">
            <h1 class="card-title">Actualizar Registro</h1>
            <br>
            <form action="update.php" method="post">
                <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="form-group">
                    <label for="mail">E-Mail</label>
                    <input type="text" class="form-control" name="mail" placeholder="E-Mail" value="<?php echo $mail; ?>">
                </div>
                <div class="form-group">
                    <label for="codigocurso">Codigo Curso</label>

                    <select class="form-control" id="codigocurso" name="codigocurso">
                        <?php
                            foreach($cursos as $fila) {
                                if ($codigocurso == $fila -> get('codigo')){
                                    echo "<option value='".$fila -> get('codigo')."' selected>".$fila -> get('nombrecurso')."</option>";
                                }else{
                                    echo "<option value='".$fila -> get('codigo')."'>".$fila -> get('nombrecurso')."</option>";
                                }
                            }
                            ?>
                    </select>

                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
</body>

</html>