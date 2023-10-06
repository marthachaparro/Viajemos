<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-Whith, Content-Type, Accept");

//$json = file_get_contents('php://input');

//$params = json_decode($json);

require("../conexion.php");

$editar = "UPDATE administradores SET nombre='lilia', correo='lilimar2@hotmail.com', fo_usuario='12'WHERE id_administradores=5";
//$editar = "UPDATE administradores SET nombre='$params->nombre',correo='$params->correo',fo_usuario='$paramas->12' WHERE id_usuario=$paramas->id_usuario";

mysqli_query($conexion, $editar) or die('no inserto');


class Result {}

$response = new Result();
$response->result = 'ok';
$response-> mensaje = 'datos modificados';

header('Content-Type: application/json');
echo json_encode($response);

?>