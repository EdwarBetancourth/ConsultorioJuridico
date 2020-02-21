<?php
    $host = "localhost";
    $basededatos = "consultorjuridico";
    $usuario = "root";
    $contraseña = "";

    $conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
    if ($conexion -> connect_errno)
    {
        die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
    }

    $tabla="";
    $query="SELECT * FROM mactuaciones WHERE 1";

    ///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
    if(isset($_POST['mactuaciones'])){
        $q=$conexion->real_escape_string($_POST['mactuaciones']);
        $query="select * from mactuaciones";
    }

    $buscarmactuaciones=$conexion->query($query);
    if ($buscarmactuaciones->num_rows > 0){
        $tabla.= 
        '<table class="table table-bordered">
            <thead>
                <tr style="color: white; background: #3383FF;">
                    <th scope="col">#Opciones</th>
                    <th scope="col">Número de Radicado</th>
                    <th scope="col">Actuaciones desarrolladas</th>
                    <th scope="col">Juzgado y/o Entidad ante la cual se tramita</th>
                    <th scope="col">Radicado Juzgado y/o Entidad</th>
                    <th scope="col">Estado actuación</th>
                    <th scope="col">Resolución de actuación</th>
                    <th scope="col">Forma alterna</th>
                    <th scope="col">Estado Resolución de actuación</th>
                    <th scope="col">Desempeño del estudiante</th>
                    <th scope="col">Estado del asunto</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Fecha Modificación</th>
                </tr>
            </thead>
            <tbody>';
            while($filamactuaciones = $buscarmactuaciones->fetch_assoc()){
                $tabla.=
                    '<tr>
                        <td>
                            <div class="form-row" align="center">
                                <form action="forms/insert.php" method="post">
                                    <input type="hidden" name="idactuacion" value="'.$filamactuaciones['idactuacion'].'">
                                    <input type="hidden" name="radicado" value="'.$filamactuaciones['radicado'].'">
                                    <input type="hidden" name="actuacionesdesarrolladas" value="'.$filamactuaciones['actuacionesdesarrolladas'].'">
                                    <input type="hidden" name="juzgadoentidad_tramita" value="'.$filamactuaciones['juzgadoentidad_tramita'].'">
                                    <input type="hidden" name="radicado_juzgadoentidad" value="'.$filamactuaciones['radicado_juzgadoentidad'].'">
                                    <input type="hidden" name="estadoactuación" value="'.$filamactuaciones['estadoactuación'].'">
                                    <input type="hidden" name="tresolucionactuacion" value="'.$filamactuaciones['tresolucionactuacion'].'">
                                    <input type="hidden" name="tformaalterna" value="'.$filamactuaciones['tformaalterna'].'">
                                    <input type="hidden" name="resolucionactuacion" value="'.$filamactuaciones['resolucionactuacion'].'">
                                    <input type="hidden" name="desempenoestudiante" value="'.$filamactuaciones['desempenoestudiante'].'">
                                    <input type="hidden" name="estadoasunto" value="'.$filamactuaciones['estadoasunto'].'">
                                    <input type="hidden" name="fmodificacion" value="'.$filamactuaciones['fmodificacion'].'">
                                    <button type="submit" class="btn"><i class="fa fa-trash"></i></button>
                                </form>
                                &nbsp;
                                <form action="forms/agregarActuacion.php" method="post">
                                        <input type="hidden" name="idactuacion" value="'.$filamactuaciones['idactuacion'].'">
                                        <input type="hidden" name="radicado" value="'.$filamactuaciones['radicado'].'">
                                        <input type="hidden" name="actuacionesdesarrolladas" value="'.$filamactuaciones['actuacionesdesarrolladas'].'">
                                        <input type="hidden" name="juzgadoentidad_tramita" value="'.$filamactuaciones['juzgadoentidad_tramita'].'">
                                        <input type="hidden" name="radicado_juzgadoentidad" value="'.$filamactuaciones['radicado_juzgadoentidad'].'">
                                        <input type="hidden" name="estadoactuación" value="'.$filamactuaciones['estadoactuación'].'">
                                        <input type="hidden" name="tresolucionactuacion" value="'.$filamactuaciones['tresolucionactuacion'].'">
                                        <input type="hidden" name="tformaalterna" value="'.$filamactuaciones['tformaalterna'].'">
                                        <input type="hidden" name="resolucionactuacion" value="'.$filamactuaciones['resolucionactuacion'].'">
                                        <input type="hidden" name="desempenoestudiante" value="'.$filamactuaciones['desempenoestudiante'].'">
                                        <input type="hidden" name="estadoasunto" value="'.$filamactuaciones['estadoasunto'].'">
                                        <input type="hidden" name="fmodificacion" value="'.$filamactuaciones['fmodificacion'].'">
                                        <button type="submit" class="btn"><i class="fa fa-bars"></i></button>
                                </form>
                            </div>
                        </td>
                        <td>'.$filamactuaciones['radicado'].'</td>
                        <td>'.$filamactuaciones['actuacionesdesarrolladas'].'</td>
                        <td>'.$filamactuaciones['juzgadoentidad_tramita'].'</td>
                        <td>'.$filamactuaciones['radicado_juzgadoentidad'].'</td>
                        <td>'.$filamactuaciones['estadoactuación'].'</td>
                        <td>'.$filamactuaciones['tresolucionactuacion'].'</td>
                        <td>'.$filamactuaciones['tformaalterna'].'</td>
                        <td>'.$filamactuaciones['resolucionactuacion'].'</td>
                        <td>'.$filamactuaciones['desempenoestudiante'].'</td>
                        <td>'.$filamactuaciones['usuario'].'</td>
                        <td>'.$filamactuaciones['fmodificacion'].'</td>
                    </tr>
                    ';
            }
            $tabla.='</tbody>';
        $tabla.='</table>';
    } else{
            $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }
    echo $tabla;
?>
