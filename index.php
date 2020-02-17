<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel=StyleSheet href="style/style.css" type="text/css" media=screen>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <?php
        include('class/conexion.php');
        include('class/alumnos.php');
        include('class/alumnos_ad.php');
        include('class/curso.php');
        include('class/curso_ad.php');

        $alumnos = array();
        $cursos = array();
        
        $objConexion = new conexion();
        $objConexion -> abrir_conexion();
        
        $objalumnosAD = new alumnos_ad();
        $objcursosAD = new curso_ad();

        $alumnos = $objalumnosAD -> read($objConexion -> pdo);
        $cursos = $objcursosAD -> read($objConexion -> pdo);
    ?>
    <br>
    <br>
    <div class="container">
        <!-- Content here -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Agregar Radicado
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Radicado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="forms/insert.php" method="post">
                            <div class="form-group">
                                <label for="nombre">Nombre Estudiante</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="mail">Fecha de recepción de la consulta</label>
                                <input type="email" class="form-control" name="mail" placeholder="E-Mail">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre consultante</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Radicado consultorio Juridico</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Fecha entrega reporte</label>
                                <input type="date" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Fecha evaluación</label>
                                <input type="date" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="codigocurso">1º Primer Corte</label>
                                <select class="form-control" id="codigocurso" name="codigocurso">
                                    <option value='1'>10 días</option>
                                    <option value='2'>Seguimiento</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="codigocurso">2º Segundo Corte</label>
                                <select class="form-control" id="codigocurso" name="codigocurso">
                                    <option value='1'>10 días</option>
                                    <option value='2'>Seguimiento</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="codigocurso">3º Tercer Corte</label>
                                <select class="form-control" id="codigocurso" name="codigocurso">
                                    <option value='1'>10 días</option>
                                    <option value='2'>Seguimiento</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="codigocurso">Tipo de consulta</label>
                                <select class="form-control" id="codigocurso" name="codigocurso">
                                    <option value='1'>Información</option>
                                    <option value='2'>Asuntos con representación judicial</option>
                                    <option value='2'>Asuntos sin representación judicial</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Tema</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Subtema</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Actuaciones desarrolladas </label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Juzgado y/o Entidad ante la cual se tramita </label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Radicado Juzgado y/o Entidad</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="codigocurso">Estado actuación</label>
                                <select class="form-control" id="codigocurso" name="codigocurso">
                                    <option value='1'>Satisfactoria</option>
                                    <option value='2'>No satisfactoria</option>
                                    <option value='3'>Desinterés del Usuario</option>                                </select>
                            </div>
                            <div class="form-group">
                                <label for="codigocurso">Instancias Judiciales </label>
                                <select class="form-control" id="codigocurso" name="codigocurso">
                                    <option value='1'>Satisfactoria</option>
                                    <option value='2'>No satisfactoria</option>
                                    <option value='3'>Desinterés del Usuario</option>  
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="codigocurso">Instancias Administrativas </label>
                                <select class="form-control" id="codigocurso" name="codigocurso">
                                    <option value='1'>Satisfactoria</option>
                                    <option value='2'>No satisfactoria</option>
                                    <option value='3'>Desinterés del Usuario</option>  
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="codigocurso">Forma alterna</label>
                                <select class="form-control" id="codigocurso" name="codigocurso">
                                    <option value='1'>Información</option>
                                    <option value='2'>No satisfactoria</option>
                                    <option value='3'>Desinterés del Usuario</option>  
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="codigocurso">Forma alterna</label>
                                <select class="form-control" id="codigocurso" name="codigocurso">
                                    <option value='1'>Satisfactoria</option>
                                    <option value='2'>No satisfactoria</option>
                                    <option value='3'>Desinterés del Usuario</option>  
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Desempeño del estudiante</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="codigocurso">Estado del asunto</label>
                                <select class="form-control" id="codigocurso" name="codigocurso">
                                    <option value='1'>Abierto</option>
                                    <option value='2'>Archivado </option>
                                    <option value='2'>Desistido </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="codigocurso">Codigo Curso</label>
                                <select class="form-control" id="codigocurso" name="codigocurso">
                                    <?php
                                        foreach($cursos as $fila) {
                                            echo "<option value='".$fila -> get('codigo')."'>".$fila -> get('nombrecurso')."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content here -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCurso">
            Registrar Curso
        </button>

        <!-- Modal -->
        <div class="modal fade" id="ModalCurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrar Curso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="forms/insertcurso.php" method="post">
                            <div class="form-group">
                                <label for="nombrecurso">Nombre Curso</label>
                                <input type="text" class="form-control" name="nombrecurso" placeholder="Nombre Curso">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <br>
            <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Buscar por E-mail">
        </div>
    </div>
    <br>
    <div class="container" id="tabla_resultado">
    </div>
</body>

</html>