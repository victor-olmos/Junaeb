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
$sql = "select case z.iniciada when '100' then '99' when '0' then '1' else z.iniciada end as iniciada, case z.terminada when '100' then '99' when '0' then '1' else z.terminada end as terminada from (select CAST(((x.iniciada*100)/total) as unsigned) as iniciada, CAST(((x.terminada*100)/total) as unsigned) as terminada from (select (select count(objetivo_id) as iniciada from objetivo where estado_id = 1 and objetivo_eliminado = 0) as iniciada, (select count(objetivo_id) as terminada from objetivo where estado_id = 2 and objetivo_eliminado = 0) as terminada, (select count(objetivo_id) from objetivo where objetivo_eliminado = 0) as total) as x) as z
";

mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sql)) die();

$objetivos = array(); //creamos un array

while($row = mysqli_fetch_array($result))
{
    $iniciada=$row['iniciada'];
    $terminada=$row['terminada'];
    $objetivos[] = array('iniciada'=> $iniciada, 'terminada'=> $terminada);

}

$close = mysqli_close($conexion)
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

$json_string = json_encode($objetivos);
echo $json_string;

?>
