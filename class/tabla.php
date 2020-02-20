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
    $query="SELECT * FROM mradicados WHERE 1";

    ///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
    if(isset($_POST['mradicados']))
    {
        $q=$conexion->real_escape_string($_POST['mradicados']);
        $query="select * from mradicados where radicado like '%".$q."%' or nomestudiante like '%".$q."%' or nomconsultante like '%".$q."%' order by radicado";
    }

    $buscarmradicados=$conexion->query($query);
    if ($buscarmradicados->num_rows > 0){
        $tabla.= 
        '<table class="table table-bordered">
            <thead>
                <tr style="color: white; background: #3383FF;">
                    <th scope="col">#Opciones</th>
                    <th scope="col">Radicado Consultorio Jurídico</th>
                    <th scope="col">Nombres y Apellidos estudiante</th>
                    <th scope="col">Fecha recepción consulta</th>
                    <th scope="col">Nombre y apellido consultante</th>
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
                    <th scope="col">Usuario</th>
                    <th scope="col">Fecha Modificación</th>
                </tr>
            </thead>
            <tbody>';
            while($filamradicados = $buscarmradicados->fetch_assoc()){
                $tabla.=
                    '<tr>
                        <td>
                            <div class="form-row" align="center">
                                <form action="forms/insert.php" method="post">
                                    <input type="hidden" name="radicado" value='.$filamradicados['radicado'].'>
                                    <button type="submit" class="btn"><i class="fa fa-trash"></i></button>
                                </form>
                                &nbsp;
                                <form action="forms/editar.php" method="post">
                                        <input type="hidden" name="radicado" value='.$filamradicados['radicado'].'>
                                        <button type="submit" class="btn"><i class="fa fa-bars"></i></button>
                                </form>
                            </div>
                        </td>
                        <td>'.$filamradicados['radicado'].'</td>
                        <td>'.$filamradicados['nomestudiante'].'</td>
                        <td>'.$filamradicados['frecepcion_consulta'].'</td>
                        <td>'.$filamradicados['nomconsultante'].'</td>
                        <td>'.$filamradicados['fentrega_reporte'].'</td>
                        <td>'.$filamradicados['fevaluación'].'</td>
                        <td>'.$filamradicados['primercorte'].'</td>
                        <td>'.$filamradicados['notaprimero'].'</td>
                        <td>'.$filamradicados['segundocorte'].'</td>
                        <td>'.$filamradicados['notasegundo'].'</td>
                        <td>'.$filamradicados['tercercorte'].'</td>
                        <td>'.$filamradicados['notatercero'].'</td>
                        <td>'.$filamradicados['tipoconsulta'].'</td>
                        <td>'.$filamradicados['tema'].'</td>
                        <td>'.$filamradicados['subtema'].'</td>
                        <td>'.$filamradicados['usuario'].'</td>
                        <td>'.$filamradicados['fmodificacion'].'</td>
                    </tr>
                    ';
            }
            $tabla.='</tbody></table>';
        $tabla.='</table>';
    } else{
            $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }
    echo $tabla;
?>
