<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-Whith, Content-Type, Accept");

//$json = file_get_contents('php://input');

//$params = json_decode($json);

require("../conexion.php");

$editar = "UPDATE soporte SET nombre='prueba', correo='prueba', fo_cliente='6'WHERE id_soporte='1'";
//$editar = "UPDATE soporte SET nombre='$params->nombre',correo='$params->correo',fo_cliente='$paramas->fo_cliente' WHERE id_soporte=$paramas->id_soporte";

mysqli_query($conexion, $editar) or die('no inserto');


class Result {}

$response = new Result();
$response->result = 'ok';
$response-> mensaje = 'datos modificados';

header('Content-Type: application/json');
echo json_encode($response);

?>