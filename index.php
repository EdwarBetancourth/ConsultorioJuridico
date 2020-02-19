<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registro de radicados</title>
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
  <link rel="shortcut icon" type="image/x-icon" href="./img/logo.ico" />
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
                    <input type="email" class="form-control" name="mail"
                      placeholder="Fecha de recepción de la consulta">
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

                </div>
                <!--Segunda columna-->
                <div class="col-sm">
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
                  <div class="form-group">
                    <label for="nombre">Tema</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Tema">
                  </div>
                  <div class="form-group">
                    <label for="nombre">Subtema</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Subtema">
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
  <div class="container" id="tabla_resultad">
  <table class="table table-bordered">
            <thead>
                <tr style="color: white; background: #3383FF;">
                    <th scope="col">#Opciones</th>
                    <th scope="col">Nombres y Apellidos estudiante</th>
                    <th scope="col">Fecha recepción consulta</th>
                    <th scope="col">Nombre y apellido consultante</th>
                    <th scope="col">Radicado Consultorio Jurídico</th>
                    <th scope="col">Fecha entrega reporte</th>
                    <th scope="col">Fecha evaluación</th>
                    <th scope="col">Primer Corte</th>
                    <th scope="col">Nota Primer corte</th>
                    <th scope="col">Segundo Corte</th>
                    <th scope="col">Nota Segundo corte</th>
                    <th scope="col">Tercer Corte</th>
                    <th scope="col">Nota Tercer corte</th>
                    <th scope="col">Tipo de consulta</th>
                    <th scope="col">Tema</th>
                    <th scope="col">Subtema</th>
                </tr>
            </thead>
  </table>
  No se encontraron coincidencias con sus criterios de búsqueda.
  </div>
  <script>
    var selEntidad = document.getElementById("resolucionactuacion");
    selEntidad.addEventListener("change", function (event) {
      var startDate = document.getElementById("resolucionactuacion").value;
      if (startDate == 3) {
        document.getElementById("formaa").style.display = "block";
      } else {
        document.getElementById("formaa").style.display = "none";
      }
    });
  </script>
</body>

</html>