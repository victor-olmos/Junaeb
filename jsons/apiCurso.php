<?php 

$server = "localhost";
//$user = "intarcom_admin";
//$pass = "intar21_1234";
$user = "root";
$pass = "";
$bd = "intarcom_intarbd";

$opcion = filter_input(INPUT_POST, 'opcion');
$curso = filter_input(INPUT_POST, 'curso');
$letra = filter_input(INPUT_POST, 'letra');
$anio = filter_input(INPUT_POST, 'anio');
$docente = filter_input(INPUT_POST, 'docente');
//echo "<script> console.log(".$fecha1.") </script>"; 
$where = "";
if($curso != ""){
    $where = $where . " and curso_grado =" . $curso;
}
if($letra != ""){
    $where = $where . " and curso_letra ='" . $letra . "'";
}
if($anio != ""){
    $where = $where . " and Year(curso_periodo) =" . $anio;
}
if($docente != ""){
    $where = $where . " and usuario_id =" . $docente;
}

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inesperado en la conexion de la base de datos");

if($opcion == 1){
    $sql = "Select concat(alumno_rut, '-', alumno_verificador) as run, alumno_apellidop,
                alumno_apellidom, alumno_nombres, usuario_nombre as docente, Year(curso_periodo) as año ,case when alumno_estado = 1 then 'Vigente' else 'RETIRADO' end as estado, concat(curso_grado, ' ', curso_letra) as curso, 
                case when fecha_retiro is null then '-' else fecha_retiro end as retiro, 'X Y Z' as acciones
                from alumno as al
                inner join curso_alumno as cual 
                on al.alumno_id = cual.alumno_id
                inner join curso as cur
                on cual.curso_id = cur.curso_id
                inner join usuario as us 
                on cur.usuario_id = us.usuario_id
                where 1=1 ".$where;

    mysqli_set_charset($conexion, "utf8"); 

    if(!$result = mysqli_query($conexion, $sql)) die();

    $alumnos = array(); //creamos un array

    while($row = mysqli_fetch_array($result)) 
    { 
        //Sacamos los datos de la consulta
        $run=$row['run'];
        $apellidoP=$row['alumno_apellidop'];
        $apellidoM=$row['alumno_apellidom'];
        $nombres=$row['alumno_nombres'];
        $curso=$row['curso'];
        $docente=$row['docente'];
        $año=$row['año'];
        $estado=$row['estado'];
        $retiro=$row['retiro'];
        $acciones=$row['acciones'];

        //Los pasamos a un arreglo fila por fila
        $alumnos[] = array('run'=> $run, 'apellidoPaterno'=> $apellidoP, 'apellidoMaterno'=> $apellidoM, 'nombres'=> $nombres, 
            'docente'=>$docente, 'año'=>$año, 'curso'=> $curso, 'estado'=> $estado, 'fechaRetiro'=> $retiro, 'acciones'=> $acciones);

    }

    $close = mysqli_close($conexion) 
    or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

    $json_string = json_encode($alumnos);
    echo $json_string;
}
else if($opcion == 2){
    $sql = "Select concat(alumno_rut, '-', alumno_verificador) as run, alumno_apellidop,
                alumno_apellidom, alumno_nombres, usuario_nombre as docente, Year(curso_periodo) as año ,case when alumno_estado = 1 then 'Vigente' else 'RETIRADO' end as estado, concat(curso_grado, ' ', curso_letra) as curso, 
                case when fecha_retiro is null then '-' else fecha_retiro end as retiro, 'X Y Z' as acciones
                from alumno as al
                inner join curso_alumno as cual 
                on al.alumno_id = cual.alumno_id
                inner join curso as cur
                on cual.curso_id = cur.curso_id
                inner join usuario as us 
                on cur.usuario_id = us.usuario_id
                where Year(curso_periodo) = Year(now())";

    mysqli_set_charset($conexion, "utf8"); 

    if(!$result = mysqli_query($conexion, $sql)) die();

    $alumnos = array(); //creamos un array

    while($row = mysqli_fetch_array($result)) 
    { 
        //Sacamos los datos de la consulta
        $run=$row['run'];
        $apellidoP=$row['alumno_apellidop'];
        $apellidoM=$row['alumno_apellidom'];
        $nombres=$row['alumno_nombres'];
        $curso=$row['curso'];
        $docente=$row['docente'];
        $año=$row['año'];
        $estado=$row['estado'];
        $retiro=$row['retiro'];
        $acciones=$row['acciones'];

        //Los pasamos a un arreglo fila por fila
        $alumnos[] = array('run'=> $run, 'apellidoPaterno'=> $apellidoP, 'apellidoMaterno'=> $apellidoM, 'nombres'=> $nombres, 
            'docente'=>$docente, 'año'=>$año, 'curso'=> $curso, 'estado'=> $estado, 'fechaRetiro'=> $retiro, 'acciones'=> $acciones);

    }

    $close = mysqli_close($conexion) 
    or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

    $json_string = json_encode($alumnos);
    echo $json_string;
}



?>
