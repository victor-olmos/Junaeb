<?php

$server = "localhost";
$user = "root";
$pass = "";
$bd = "junaeb";

$holi = filter_input(INPUT_POST, 'holi');

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd)
or die("Ha sucedido un error inesperado en la conexion de la base de datos");

//generamos la consulta
$sql = "
select case z.terminada when '100' then '99' when '0' then '1' else z.terminada end as terminada, case z.curso when '100' then '99' when '0' then '1' else z.curso end as curso, case z.iniciada when '100' then '99' when '0' then '1' else z.iniciada end as iniciada
from
(select CAST((x.curso*100)/x.total as unsigned) as curso, CAST((x.iniciada*100)/x.total as unsigned) as iniciada, CAST((x.terminada*100)/x.total as unsigned) as terminada
from
(select count(actividad_id) as total, (select count(actividad_id) as curso from actividad where estado_id = 1 and actividad_eliminada = 0) as curso, (select count(actividad_id) as iniciada from actividad where estado_id = 2 and actividad_eliminada = 0) as iniciada, (select count(actividad_id) as terminada from actividad where estado_id = 3 and actividad_eliminada = 0) as terminada from actividad where actividad_eliminada = 0) as x) as z";

mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sql)) die();

$tareas = array(); //creamos un array

while($row = mysqli_fetch_array($result))
{
    $curso=$row['curso'];
    $iniciada=$row['iniciada'];
    $terminada=$row['terminada'];
    $tareas[] = array('curso'=> $curso, 'iniciada'=> $iniciada, 'terminada'=> $terminada);

}

$close = mysqli_close($conexion)
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

$json_string = json_encode($tareas);
echo $json_string;

?>
