<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-Whith, Content-Type, Accept");

//$json = file_get_contents('php://input');

//$params = json_decode($json);

require("../conexion.php");

$editar = "UPDATE contenido SET contenido='prueba', titulos='prueba', autor='prueba', fo_administradores='3' WHERE id_contenido='1'";
//$editar = "UPDATE contenido SET contenido='$params->contenido',titulos='$params->titulos', autor='$params->autor',fo_administradores='$paramas->fo_administradores' WHERE id_contenido=$paramas->id_contenido";

mysqli_query($conexion, $editar) or die('no inserto');

class Result {}

$response = new Result();
$response->result = 'ok';
$response-> mensaje = 'datos modificados';

header('Content-Type: application/json');
echo json_encode($response);

?>