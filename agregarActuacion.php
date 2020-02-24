<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registro de Actuaciones</title>
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
  <script src="js/main2.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="./img/logo.ico" />
</head>

<body>
  <?php
        include('./class/conexion.php');
        include('./class/mradicados.php');
        include('./class/mradicados_ad.php');

        $mradicados = array();
        $cursos = array();
        
        $objConexion = new conexion();
        $objConexion -> abrir_conexion();
        
        $objmradicadosAD = new mradicados_ad();

        $radicado = "";
        $nomestudiante = "";
        $frecepcion_consulta = "";
        $nomconsultante = "";
        $fentrega_reporte = "";
        $fevaluación = "";
        $primercorte = "";
        $notaprimero = "";
        $segundocorte = "";
        $notasegundo = "";
        $tercercorte = "";
        $notatercero = "";
        $tipoconsulta = "";
        $tema = "";
        $subtema = "";
        $usuario = "";
        $fmodificacion = "";

        if(array_key_exists('radicado',$_POST)) {
          $radicado = $_POST['radicado'];
          $nomestudiante = $_POST['nomestudiante'];
          $frecepcion_consulta = $_POST['frecepcion_consulta'];
          $nomconsultante = $_POST['nomconsultante'];
          $fentrega_reporte = $_POST['fentrega_reporte'];
          $fevaluación = $_POST['fevaluación'];
          $primercorte = $_POST['primercorte'];
          $notaprimero = $_POST['notaprimero'];
          $segundocorte = $_POST['segundocorte'];
          $notasegundo = $_POST['notasegundo'];
          $tercercorte = $_POST['tercercorte'];
          $notatercero = $_POST['notatercero'];
          $tipoconsulta = $_POST['tipoconsulta'];
          $tema = $_POST['tema'];
          $subtema = $_POST['subtema'];
          $usuario = $_POST['usuario'];
          $fmodificacion = $_POST['fmodificacion'];
        }

    ?>
  <br>
  <br>
  <div class="container">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">
      Agregar actuación
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
          <form action="forms/insert_mactuaciones.php" method="post">
            <div class="container">
              <!--Contenido-->
              <div class="row">
                <!--primera columna-->
                <div class="col-sm">
                    <input type="hidden" name="radicado" value="<?php echo $radicado; ?>">
                    <div class="form-group">
                        <label for="actuacionesdesarrolladas">Actuaciones desarrolladas</label>
                        <input type="text" class="form-control" name="actuacionesdesarrolladas" placeholder="Actuaciones desarrolladas">
                    </div>
                    <div class="form-group">
                        <label for="juzgadoentidad_tramita">Juzgado y/o Entidad ante la cual se tramita </label>
                        <input type="text" class="form-control" name="juzgadoentidad_tramita" placeholder="Juzgado y/o Entidad ante la cual se tramita">
                    </div>
                    <div class="form-group">
                        <label for="radicado_juzgadoentidad">Radicado Juzgado y/o Entidad</label>
                        <input type="text" class="form-control" name="radicado_juzgadoentidad" placeholder="Radicado Juzgado y/o Entidad">
                    </div>
                    <div class="form-group">
                        <label for="estadoactuacion">Estado actuación</label>
                        <select class="form-control" id="estadoactuacion" name="estadoactuacion">
                            <option value='Satisfactoria'selected>Satisfactoria</option>
                            <option value='No satisfactoria'>No satisfactoria</option>
                            <option value='Desinterés del Usuario'>Desinterés del Usuario</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="usuario">usuario</label>
                      <input type="email" class="form-control" name="usuario" placeholder="usuario">
                    </div>
                </div>
                <!--Segunda columna-->
                <div class="col-sm">
                    <div class="form-group">
                        <label for="tresolucionactuacion">Resolución de actuación</label>
                        <select class="form-control" id="tresolucionactuacion" name="tresolucionactuacion">
                            <option value='Instancias Judiciales' selected>Instancias Judiciales</option>
                            <option value='Instancias Administrativas'>Instancias Administrativas</option>
                            <option value='Forma alterna'>Forma alterna</option>
                        </select>
                    </div>
                    <div class="form-group" id="formaa" style="display: none">
                        <label for="tformaalterna">Forma alterna</label>
                        <select class="form-control" id="tformaalterna" name="tformaalterna">
                            <option value='No Aplica' selected>No Aplica</option>
                            <option value='Información'>Información</option>
                            <option value='MASC'>MASC</option>
                            <option value='Soluciones jurídicas o sociales alternas'>Soluciones jurídicas o sociales alternas</option>
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="resolucionactuacion" id="resolucionactuacion" value="Satisfactoria">
                        <label class="form-check-label" for="resolucionactuacion">Satisfactoria</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="resolucionactuacion" id="resolucionactuacion" value="No satisfactoria">
                        <label class="form-check-label" for="resolucionactuacion">No satisfactoria</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="resolucionactuacion" id="resolucionactuacion" value="Desinterés del Usuario">
                        <label class="form-check-label" for="resolucionactuacion">Desinterés del Usuario</label>
                    </div>
                    <div class="form-group">
                        <label for="desempenoestudiante">Desempeño del estudiante</label>
                        <input type="text" class="form-control" name="desempenoestudiante" placeholder="Desempeño del estudiante">
                    </div>
                    <div class="form-group">
                        <label for="estadoasunto">Estado del asunto</label>
                        <select class="form-control" id="estadoasunto" name="estadoasunto">
                            <option value='Abierto'>Abierto</option>
                            <option value='Archivado'>Archivado </option>
                            <option value='Desistido'>Desistido </option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="fmodificacion">Fecha Inscripción</label>
                      <input type="date" class="form-control" name="fmodificacion" placeholder="Fecha Inscripción">
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
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm">
            <h6>Radicado Consultorio Jurídico:</h6> <?php echo $radicado; ?>
            </div>
            <div class="col-sm">
            <h6>Nombres y Apellidos estudiante:</h6> <?php echo $nomestudiante; ?>
            </div>
            <div class="col-sm">
            <h6>Fecha recepción consulta:</h6> <?php echo $frecepcion_consulta; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
            <h6>Nombre y apellido consultante:</h6> <?php echo $nomconsultante; ?>
            </div>
            <div class="col-sm">
            <h6>Fecha entrega reporte:</h6> <?php echo $fentrega_reporte; ?>
            </div>
            <div class="col-sm">
            <h6>Fecha evaluación:</h6> <?php echo $fevaluación; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
            <h6>Primer Corte:</h6>  <?php echo $primercorte; ?> <h6>Nota Primer corte:</h6> <?php echo $notaprimero; ?>
            </div>
            <div class="col-sm">
            <h6>Segundo Corte:</h6>  <?php echo $segundocorte; ?> <h6>Nota Segundo corte:</h6> <?php echo $notasegundo; ?>
            </div>
            <div class="col-sm">
            <h6>Tercer Corte:</h6>  <?php echo $tercercorte; ?> <h6>Nota Tercer corte:</h6> <?php echo $notatercero; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
            <h6>Tipo de consulta:</h6> <?php echo $tipoconsulta; ?>
            </div>
            <div class="col-sm">
            <h6>Tema:</h6> <?php echo $tema; ?>
            </div>
            <div class="col-sm">
            <h6>Subtema:</h6> <?php echo $subtema; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
            <h6>Usuario:</h6> <?php echo $usuario; ?>
            </div>
            <div class="col-sm">
            <h6>Fecha Inscripción:</h6> <?php echo $fmodificacion; ?>
            </div>
        </div>
    </div>
    <div class="form-group">
      <br>
      <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Buscar por E-mail">
    </div>
  </div>
  <br>
  <div class="container" >
  <div class="table-responsive" id="tabla_resultado">

</div>
  </div>
  <script>
    var selEntidad = document.getElementById("tresolucionactuacion");
    selEntidad.addEventListener("change", function (event) {
      var startDate = document.getElementById("tresolucionactuacion").value;
      if (startDate == "Forma alterna") {
        document.getElementById("formaa").style.display = "block";
      } else {
        document.getElementById("formaa").style.display = "none";
      }
    });
  </script>
</body>
</html>