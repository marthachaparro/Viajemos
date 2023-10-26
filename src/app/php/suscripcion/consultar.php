<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-Whith, Content-Type, Accept");

require("../conexion.php");

$con = "SELECT * from suscripcion ORDER BY fo_cliente";
$res=mysqli_query($conexion,$con) or die('no consulto suscripcion');


$vec=[];
while($reg=mysqli_fetch_array($res))
{
    $vec[]=$reg;
}

$cad=json_encode($vec);
echo $cad;
header('Content-Type: application/json');
?>