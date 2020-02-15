<?php 

$server = "localhost";
//$user = "intarcom_admin";
//$pass = "intar21_1234";
$user = "root";
$pass = "";
$bd = "intarcom_intarbd";

$curso_id = filter_input(INPUT_POST, 'curso_id');
$opcion = filter_input(INPUT_POST, 'opcion');
//echo "<script> console.log(".$fecha1.") </script>"; 

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inesperado en la conexion de la base de datos");

if($opcion == 1){
    $sql = "Select (YEAR(CURRENT_TIMESTAMP) - YEAR(alumno_nacimiento) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(alumno_nacimiento, 5))) as edad, 
                concat('<a href=''#'' data-toggle=''modal''><img src=''images/lupa_ojo_icon.png'' height=''20'' width=''20'' onclick=''verMas(' , al.alumno_id , ')''></a><a href=''#'' data-toggle=''modal''><img src=''images/ver_mas_icon.png''  height=''20'' width=''20'' onclick=''adicional(' , al.alumno_id , ')''></a><a href=''#'' data-toggle=''modal''><img src=''images/borrar_icon.png'' height=''20'' width=''20'' onclick=''retirar(' , al.alumno_id , ')''></a>') as btn, 
            concat(alumno_rut, '-', alumno_verificador) as run, alumno_apellidop, 
            alumno_apellidom, alumno_nombres, concat(curso_grado, ' ', curso_letra) as curso, alumno_estado, 
            case when fecha_retiro is null then '-' else fecha_retiro end as retiro 
            from alumno as al inner join curso_alumno as cual on al.alumno_id = cual.alumno_id 
            inner join curso as cur on cual.curso_id = cur.curso_id where cur.curso_id = ".$curso_id;

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
        if($row['alumno_estado'] == 1){
            $estado = "Vigente";
        }
        else if($row['alumno_estado'] == 0){
            $estado = "RETIRADO";
        }
        $retiro=$row['retiro'];
        $acciones=$row['btn'];
        $edad = $row['edad'];
        

        //Los pasamos a un arreglo fila por fila
        $alumnos[] = array('run'=> $run, 'apellidoPaterno'=> $apellidoP, 'apellidoMaterno'=> $apellidoM, 'nombres'=> $nombres,
             'edad'=> $edad, 'curso'=> $curso, 'estado'=> $estado, 'fechaRetiro'=> $retiro, 'acciones'=> $acciones);

    }

    $close = mysqli_close($conexion) 
    or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

    $json_string = json_encode($alumnos);
    echo $json_string;
}
else if($opcion == 2){
    $sql = "Select (YEAR(CURRENT_TIMESTAMP) - YEAR(alumno_nacimiento) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(alumno_nacimiento, 5))) as edad, 
                concat('<a href=''#'' data-toggle=''modal''><img src=''images/lupa_ojo_icon.png'' height=''20'' width=''20'' onclick=''verMas(' , al.alumno_id , ')''></a><a href=''#'' data-toggle=''modal''><img src=''images/ver_mas_icon.png''  height=''20'' width=''20'' onclick=''adicional(' , al.alumno_id , ')''></a><a href=''#'' data-toggle=''modal''><img src=''images/borrar_icon.png'' height=''20'' width=''20'' onclick=''retirar(' , al.alumno_id , ')''></a>') as btn, 
            concat(alumno_rut, '-', alumno_verificador) as run, alumno_apellidop, 
            alumno_apellidom, alumno_nombres, concat(curso_grado, ' ', curso_letra) as curso, alumno_estado, 
            case when fecha_retiro is null then '-' else fecha_retiro end as retiro 
            from alumno as al inner join curso_alumno as cual on al.alumno_id = cual.alumno_id 
            inner join curso as cur on cual.curso_id = cur.curso_id";

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
        $estado=$row['alumno_estado'];
        $retiro=$row['retiro'];
        $acciones=$row['btn'];
        $edad = $row['edad'];

        //Los pasamos a un arreglo fila por fila
        $alumnos[] = array('run'=> $run, 'apellidoPaterno'=> $apellidoP, 'apellidoMaterno'=> $apellidoM, 'nombres'=> $nombres, 
            'edad'=> $edad, 'curso'=> $curso, 'estado'=> $estado, 'fechaRetiro'=> $retiro, 'acciones'=> $acciones);

    }

    $close = mysqli_close($conexion) 
    or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

    $json_string = json_encode($alumnos);
    echo $json_string;
}



?>
