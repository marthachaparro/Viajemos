<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-Whith, Content-Type, Accept");

//$json = file_get_contents('php://input');

//$params = json_decode($json);

require("../conexion.php");

$editar = "UPDATE suscripcion SET fo_cliente='5',fo_servicios='1', fo_usuario= '5' WHERE id_suscripcion='1'";
//$editar = "UPDATE suscripcion SET fo_cliente='$params->fo_cliente',fo_servicios='$paramas->fo_servicios, fo_usuario=$params->fo_usuario' WHERE id_suscripcion=$paramas->id_suscripcion";

mysqli_query($conexion, $editar) or die('no inserto');


class Result {}

$response = new Result();
$response->result = 'ok';
$response-> mensaje = 'datos modificados';

header('Content-Type: application/json');
echo json_encode($response);

?>