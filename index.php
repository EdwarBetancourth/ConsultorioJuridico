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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">
            Agregar Radicado
        </button>
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Formulario Caso Juridico</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="forms/insert.php" method="post">
                        <div class="container">
                          <!--Contenido-->
                          <div class="row">
                            <!--primera columna-->
                            <div class="col-sm">
                              <div class="form-group">
                                <label for="nombre">Nombre Estudiante</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre Estudiante">
                              </div>
                              <div class="form-group">
                                <label for="mail">Fecha de recepción de la consulta</label>
                                <input type="email" class="form-control" name="mail" placeholder="Fecha de recepción de la consulta">
                              </div>
                              <div class="form-group">
                                <label for="nombre">Nombre consultante</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre consultante">
                              </div>
                              <div class="form-group">
                                <label for="nombre">Radicado consultorio Juridico</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Radicado consultorio Juridico">
                              </div>
                              <div class="form-group">
                                <label for="nombre">Fecha entrega reporte</label>
                                <input type="date" class="form-control" name="nombre" placeholder="Fecha entrega reporte">
                              </div>
                              <div class="form-group">
                                <label for="nombre">Fecha evaluación</label>
                                <input type="date" class="form-control" name="nombre" placeholder="Fecha evaluación">
                              </div>
                              <div class="row">
                                <div class="col-sm">
                                  <div class="form-group">
                                    <label for="codigocurso">1º Primer Corte</label>
                                    <select class="form-control" id="codigocurso" name="codigocurso">
                                      <option value='1'>10 días</option>
                                      <option value='2'>Seguimiento</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-sm">
                                  <label for="nombre">Nota </label>
                                  <input type="number" class="form-control" name="nombre">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm">
                                  <div class="form-group">
                                    <label for="codigocurso">2º Segundo Corte</label>
                                    <select class="form-control" id="codigocurso" name="codigocurso">
                                      <option value='1'>10 días</option>
                                      <option value='2'>Seguimiento</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-sm">
                                  <label for="nombre">Nota </label>
                                  <input type="number" class="form-control" name="nombre">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm">
                                  <div class="form-group">
                                    <label for="codigocurso">3º Tercer Corte</label>
                                    <select class="form-control" id="codigocurso" name="codigocurso">
                                      <option value='1'>10 días</option>
                                      <option value='2'>Seguimiento</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-sm">
                                  <label for="nombre">Nota </label>
                                  <input type="number" class="form-control" name="nombre">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="codigocurso">Tipo de consulta</label>
                                <select class="form-control" id="codigocurso" name="codigocurso">
                                  <option value='1'>Información</option>
                                  <option value='2'>Asuntos con representación judicial</option>
                                  <option value='2'>Asuntos sin representación judicial</option>
                                </select>
                              </div>
                            </div>
                            <!--Segunda columna-->
                            <div class="col-sm">
                    
                              <div class="form-group">
                                <label for="nombre">Tema</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Tema">
                              </div>
                              <div class="form-group">
                                <label for="nombre">Subtema</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Subtema">
                              </div>
                              <div class="form-group">
                                <label for="nombre">Actuaciones desarrolladas</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Actuaciones desarrolladas">
                              </div>
                              <div class="form-group">
                                <label for="nombre">Juzgado y/o Entidad ante la cual se tramita </label>
                                <input type="text" class="form-control" name="nombre"
                                  placeholder="Juzgado y/o Entidad ante la cual se tramita">
                              </div>
                              <div class="form-group">
                                <label for="nombre">Radicado Juzgado y/o Entidad</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Radicado Juzgado y/o Entidad">
                              </div>
                              <div class="form-group">
                                <label for="codigocurso">Estado actuación</label>
                                <select class="form-control" id="codigocurso" name="codigocurso">
                                  <option value='1'>Satisfactoria</option>
                                  <option value='2'>No satisfactoria</option>
                                  <option value='3'>Desinterés del Usuario</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="codigocurso">Resolución de actuación</label>
                                <select class="form-control" id="resolucionactuacion" name="resolucionactuacion">
                                  <option value='1' selected>Instancias Judiciales</option>
                                  <option value='2'>Instancias Administrativas</option>
                                  <option value='3'>Forma alterna</option>
                                </select>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                  <label class="form-check-label" for="inlineRadio1">Satisfactoria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                  <label class="form-check-label" for="inlineRadio2">No satisfactoria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                  <label class="form-check-label" for="inlineRadio3">Desinterés del Usuario</label>
                                </div>
                              </div>
                              <p id="demo"></p>
                              <script>

                                // Display some data from the object:
                                function validar() {
                                        if (document.getElementById.resolucionactuacion.value == "1" ) {
                                            var seleccion = document.getElementById("resolucionactuacion").value;
                                            document.getElementById("demo").innerHTML = " " + seleccion;
                                        };
                                }

                                var selEntidad = document.getElementById("entidad");

                                selEntidad.addEventListener("change", function(event) {

                                  var startDate = document.getElementById("start_date").value.trim();
                                  if (startDate) {
                                    console.log("no está vacío... proceder. \nAquí tienes el valor del select: " + this.value + "\ny este es el del input: " + startDate);
                                  } else {
                                    console.log("está vacío...");
                                  }
                                });
                              </script>
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
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm" style="align-content: center;">
                              <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                          </div>
                        </div>
                      </form>
                      <br>
                      <br>
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
