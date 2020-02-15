<?php 

$server = "localhost";
//$user = "intarcom_admin";
//$pass = "intar21_1234";
$user = "root";
$pass = "";
$bd = "intarcom_intarbd";

$alumno_id = filter_input(INPUT_POST, 'alumno_id');
//echo "<script> console.log(".$fecha1.") </script>"; 

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inesperado en la conexion de la base de datos");

$sql = "Select al.alumno_id as id, CONCAT(ALUMNO_NOMBRES, ' ', ALUMNO_APELLIDOP, ' ', ALUMNO_APELLIDOM) as nombre,
        case when ALUMNO_OBSERVACION is null then '-' else ALUMNO_OBSERVACION end as observacion, CASE when ALUMNO_PIE = 1 then 'Si' else 'No' END as pie, 
        case when x.cont = 1 then 'No' else concat('Si: ', x.cursos) end as repitencia,
        case when x.obs is null then '-' else x.obs end as cur_obs, 
        case when y.condicion is null then '-' else y.condicion end as condicion
        from alumno as al
        left join (select count(curso_grado) as cont, al.alumno_id,
        group_concat(concat(curso_grado, curso_letra, '-', Year(curso_periodo)) SEPARATOR ' , ') as cursos,
        group_concat(CUR_AL_OBSERVACION SEPARATOR ' , ') as obs
        from alumno as al
        left join curso_alumno as cur_al on al.alumno_id = cur_al.alumno_id
        left join curso as cur on cur.curso_id = cur_al.curso_id
        group by curso_grado, alumno_rut) as x
        on x.alumno_id = al.alumno_id
        left join (Select al.alumno_id, group_concat(diagnostico_nombre SEPARATOR ' , ') as condicion
        from alumno as al
        left join alumno_diagnostico as al_diag 
        on al.alumno_id = al_diag.alumno_id
        left join diagnostico as diag
        on al_diag.diagnostico_id = diag.diagnostico_id
        group by al.alumno_id) as y
        on y.alumno_id = al.alumno_id
        where al.alumno_id = ".$alumno_id;

mysqli_set_charset($conexion, "utf8"); 

if(!$result = mysqli_query($conexion, $sql)) die();

$alumnos = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
    //Sacamos los datos de la consulta
    //$rut=$row['rut'];

    $nombre = $row['nombre'];
    $observacion = $row['observacion'];
    $pie = $row['pie'];
    $repitencia = $row['repitencia'];
    $cur_obs = $row['cur_obs'];
    $condicion = $row['condicion'];


    //Los pasamos a un arreglo fila por fila
    $alumnos[] = array('nombre'=> $nombre, 'observacion'=> $observacion, 'pie'=> $pie, 'repitencia'=> $repitencia, 'cur_obs'=> $cur_obs, 'condicion'=> $condicion);

}

$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

$json_string = json_encode($alumnos);
echo $json_string;

?>
