<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-Whith, Content-Type, Accept");

require("../conexion.php");

$del = "DELETE FROM departamento WHERE id_dpto=" .$_GET['id'];
mysqli_query($conexion, $del) or die('no elimino');


class Result {}

$response = new Result();
$response->result = 'ok';
$response-> mensaje = 'elemento borrado';

header('Content-Type: application/json');
echo json_encode($response);

?>