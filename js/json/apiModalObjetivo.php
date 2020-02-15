<?php

$server = "localhost";
$user = "root";
$pass = "";
$bd = "junaeb";

$id = filter_input(INPUT_POST, 'idObjetivo');

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd)
or die("Ha sucedido un error inesperado en la conexion de la base de datos");

//generamos la consulta
$sql = "select objetivo_id as ID, objetivo_nombre as NOMBRE, objetivo_responsable as RESPONSABLE, objetivo_descripcion as DESCRIPCION, objetivo_meta as META, objetivo_actual as ACTUAL, usuario_nombre as NOMBREUSER, concat(cast(((objetivo_actual*100)/objetivo_meta) as unsigned),'%') as AVANCE
from objetivo inner join usuario on objetivo.usuario_id = usuario.usuario_id where objetivo_id = ".$id;

mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sql)) die();

$objetivos = array(); //creamos un array

while($row = mysqli_fetch_array($result)) //nombre, responsable, inicio, termino, descripcion, estado
{
    $nombre=$row['NOMBRE'];
    $meta=$row['META'];
    $avance=$row['AVANCE'];
    $actual=$row['ACTUAL'];
    $responsable=$row['RESPONSABLE'];
    $descripcion=$row['DESCRIPCION'];
    $objetivos[] = array('nombre'=> $nombre, 'meta'=> $meta, 'avance'=> $avance, 'actual'=> $actual, 'descripcion'=> $descripcion, 'responsable'=> $responsable);
}

$close = mysqli_close($conexion)
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

$json_string = json_encode($objetivos);
echo $json_string;

?>
