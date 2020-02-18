<?php
    $host = "localhost";
    $basededatos = "base1";
    $usuario = "root";
    $contraseña = "";

    $conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
    if ($conexion -> connect_errno)
    {
        die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
    }

    
    $tabla="";
    $query="SELECT alumnos.codigo,nombre,mail,codigocurso,nombrecurso from alumnos inner join cursos on alumnos.codigocurso = cursos.codigo order by alumnos.codigo";

    ///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
    if(isset($_POST['alumnos']))
    {
        $q=$conexion->real_escape_string($_POST['alumnos']);
        $query="select alumnos.codigo,nombre,mail,codigocurso,nombrecurso from alumnos inner join cursos on alumnos.codigocurso = cursos.codigo where mail like '%".$q."%' order by alumnos.codigo";
    }

    $buscarAlumnos=$conexion->query($query);
    if ($buscarAlumnos->num_rows > 0){
        $tabla.= 
        '<table class="table table-bordered">
            <thead>
                <tr style="color: white; background: #3383FF;">
                    <th scope="col">#Opciones</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Codigo Curso</th>
                    <th scope="col">Nombre Curso</th>
                </tr>
            </thead>
            <tbody>';
            while($filaAlumnos = $buscarAlumnos->fetch_assoc()){
                $tabla.=
                    '<tr>
                        <td>
                            <div class="form-row" align="center">
                                <form action="forms/insert.php" method="post">
                                    <input type="hidden" name="codigo" value='.$filaAlumnos['codigo'].'>
                                    <button type="submit" class="btn"><i class="fa fa-trash"></i></button>
                                </form>
                                &nbsp;
                                <form action="forms/editar.php" method="post">
                                        <input type="hidden" name="codigo" value='.$filaAlumnos['codigo'].'>
                                        <input type="hidden" name="nombre" value='.$filaAlumnos['nombre'].'>
                                        <input type="hidden" name="mail" value='.$filaAlumnos['mail'].'>
                                        <input type="hidden" name="codigocurso" value='.$filaAlumnos['codigocurso'].'>
                                        <button type="submit" class="btn"><i class="fa fa-bars"></i></button>
                                </form>
                            </div>
                        </td>
                        <td>'.$filaAlumnos['nombre'].'</td>
                        <td>'.$filaAlumnos['mail'].'</td>
                        <td>'.$filaAlumnos['codigocurso'].'</td>
                        <td>'.$filaAlumnos['nombrecurso'].'</td>
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
