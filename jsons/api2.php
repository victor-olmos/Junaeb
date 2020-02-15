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

$sql = "select concat(alumno_rut, '-', alumno_verificador) as rut, 
    DATE_FORMAT(alumno_nacimiento,'%m-%d-%Y') as nacimiento, 
    concat(alumno_nombres, ' ', alumno_apellidoP, ' ', alumno_apellidoM) as nombre, 
    alumno_fonocontacto as fonocontacto, alumno_responsable as tutor, alumno_direccion as direccion, 
    case when alumno_estado = 1 then 'VIGENTE' else 'RETIRADO' end as estado, 
    concat(curso_grado, ' ', curso_letra) as curso, DATE_FORMAT(fecha_incorporacion,'%m-%d-%Y') as incorporacion, 
    usuario_nombre, comuna_nombre from alumno as al inner join comuna as com on com.comuna_id = al.comuna_id 
    inner join curso_alumno as cural on cural.alumno_id = al.alumno_id 
    inner join curso as cur on cur.curso_id = cural.curso_id 
    inner join usuario as us on cur.usuario_id = us.usuario_id 
    where DATE_FORMAT(NOW(),'%Y') = DATE_FORMAT(curso_periodo,'%Y') and al.alumno_id = ".$alumno_id;

mysqli_set_charset($conexion, "utf8"); 

if(!$result = mysqli_query($conexion, $sql)) die();

$alumnos = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
    //Sacamos los datos de la consulta
    //$rut=$row['rut'];

    $rut = $row['rut'];
    $nacimiento = $row['nacimiento'];
    $nombre = $row['nombre'];
    $fonocontacto = $row['fonocontacto'];
    $tutor = $row['tutor'];
    $direccion = $row['direccion'];
    $estado = $row['estado'];
    $curso = $row['curso'];
    $incorporacion = $row['incorporacion'];
    $usuario_nombre = $row['usuario_nombre'];
    $comuna = $row['comuna_nombre'];

    //Los pasamos a un arreglo fila por fila
    $alumnos[] = array('rut'=> $rut, 'nacimiento'=> $nacimiento, 'nombre'=> $nombre, 'fonocontacto'=> $fonocontacto, 'comuna'=> $comuna,
        'tutor'=> $tutor, 'direccion'=> $direccion, 'estado'=> $estado, 'curso'=> $curso, 'incorporacion'=> $incorporacion, 'usuario_nombre'=> $usuario_nombre);

}

$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

$json_string = json_encode($alumnos);
echo $json_string;

?>
