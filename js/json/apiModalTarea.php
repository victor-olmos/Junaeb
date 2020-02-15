<?php

$server = "localhost";
$user = "root";
$pass = "";
$bd = "junaeb";

$id = filter_input(INPUT_POST, 'idTarea');

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd)
or die("Ha sucedido un error inesperado en la conexion de la base de datos");

//generamos la consulta
$sql = "Select actividad_nombre as nombre, actividad_responsable as responsable, DATE_FORMAT(actividad_fechainicio, '%d-%m-%Y %H:%i') as inicio, DATE_FORMAT(actividad_fechatermino, '%d-%m-%Y %H:%i') as termino, actividad_descripcion as descripcion, estado_nombre as estado from actividad inner join estado on actividad.estado_id = estado.estado_id where actividad_id = ".$id;

mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sql)) die();

$tareas = array(); //creamos un array

while($row = mysqli_fetch_array($result)) //nombre, responsable, inicio, termino, descripcion, estado
{
    $nombre=$row['nombre'];
    $responsable=$row['responsable'];
    $inicio=$row['inicio'];
    $termino=$row['termino'];
    $descripcion=$row['descripcion'];
    $estado=$row['estado'];
    $tareas[] = array('nombre'=> $nombre, 'responsable'=> $responsable, 'inicio'=> $inicio, 'termino'=> $termino, 'descripcion'=> $descripcion, 'estado'=> $estado);

}

$close = mysqli_close($conexion)
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

$json_string = json_encode($tareas);
echo $json_string;

?>
