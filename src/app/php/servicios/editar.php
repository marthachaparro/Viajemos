<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-Whith, Content-Type, Accept");

//$json = file_get_contents('php://input');

//$params = json_decode($json);

require("../conexion.php");

$editar = "UPDATE servicios SET nombre='prueba', codigo='125'WHERE id_servicios='4'";
//$editar = "UPDATE servicios SET nombre='$params->nombre',codigo='$paramas->codigo' WHERE id_servicios=$paramas->id_servicios";

mysqli_query($conexion, $editar) or die('no inserto');



class Result {}

$response = new Result();
$response->result = 'ok';
$response-> mensaje = 'datos modificados';

header('Content-Type: application/json');
echo json_encode($response);

?>