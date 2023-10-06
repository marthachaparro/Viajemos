<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-Whith, Content-Type, Accept");

$json = file_get_contents('php://input');

$params = json_decode($json);

require("../conexion.php");

//$ins = "insert into usuario(usuario, clave, correo, celular, tipo_usuario) values('prueba', sha1('123456'),'prueba','3105879965','Invitado')";
$ins = "insert into usuario(usuario, clave, correo, celular, tipo_usuario) values ('$params->usuario',sha1('$params->clave'),'$params->correo', '$params->celular', '$paramas->tipo_usuario')";

mysqli_query($conexion, $ins) or die('no inserto');


class Result {}

$response = new Result();
$response->result = 'ok';
$response-> mensaje = 'datos grabados';

header('Content-Type: application/json');
echo json_encode($response);

?>