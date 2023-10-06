<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-Whith, Content-Type, Accept");

//$json = file_get_contents('php://input');

//$params = json_decode($json);

require("../conexion.php");

$ins = "insert into contenido(contenido,titulos, autor,fo_administradores) values('prueba','prueba', 'prueba', '3')";
//$ins = "insert into contenido(contenido,titulos, autor,fo_administradores) values ('$params->contenido','$params->titulos','$params->autor','$params->fo_administradores')";

mysqli_query($conexion, $ins) or die('no inserto');


class Result {}

$response = new Result();
$response->result = 'ok';
$response-> mensaje = 'datos grabados';

header('Content-Type: application/json');
echo json_encode($response);

?>