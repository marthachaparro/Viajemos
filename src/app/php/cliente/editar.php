<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-Whith, Content-Type, Accept");

//$json = file_get_contents('php://input');

//$params = json_decode($json);

require("../conexion.php");

$editar = "UPDATE cliente SET identificacion='2546822', nombre='prueba', dirreccion='prueba',celular='3215489655',correo='prueba', fo_ciudad=132'5'WHERE id_ciente='1'";
//$editar = "UPDATE ciudad SET identificacion='$params->identificacion',nombre='$params->nombre',dirreccion='$params->dirreccion',celular='$params->celular',correo='$params->correo',fo_ciudad='$params->fo_ciudad' WHERE id_cliente=$paramas->id_cliente";

mysqli_query($conexion, $editar) or die('no inserto');


class Result {}

$response = new Result();
$response->result = 'ok';
$response-> mensaje = 'datos modificados';

header('Content-Type: application/json');
echo json_encode($response);