<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-Whith, Content-Type, Accept");

//$json = file_get_contents('php://input');

//$params = json_decode($json);

require("../conexion.php");

$editar = "UPDATE usuario SET usuario='prueba',clave=sha1('12535'), correo='prueba', celular='3215469875', tipo_usuario='Invitado' WHERE id_usuario='5'";
//$editar = "UPDATE usuario SET usuario='$params->usuario',clave= sha1('$paramas->clave'),correo='$params->correo',celular='$params->celular', tipo_usuario='$params->tipo_usuario' WHERE id_usuario=$paramas->id_usuario";

mysqli_query($conexion, $editar) or die('no inserto');


class Result {}

$response = new Result();
$response->result = 'ok';
$response-> mensaje = 'datos modificados';

header('Content-Type: application/json');
echo json_encode($response);

?>