<?php
include "conexion.php";
// MySQL database connection code
//$connection = mysqli_connect("localhost","root","","petdb") or die("Error " . mysqli_error($connection));
//Fetch productos data
$sql = "select especie,COUNT(especie) from mascota GROUP by especie";
$result = mysqli_query($conexion, $sql) or die("Error in Selecting " . mysqli_error($conexion));
//create an array
$array = array();
$i = 0;
while($row = mysqli_fetch_assoc($result))
{  
    $producto = $row['especie'];
    $unidades_vendidas = $row['COUNT(especie)'];
    $array['cols'][] = array('type' => 'string'); 
    $array['rows'][] = array('c' => array( array('v'=> $producto), array('v'=>(int)$unidades_vendidas)) );
}
$data = json_encode($array);
echo $data;

?>