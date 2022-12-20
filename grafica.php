<?php

require 'conexion.php';

$consulta = "select especie, COUNT(especie) from mascota GROUP by especie"; // Consulta SQL
$resultado = mysqli_query($conexion,$consulta); // Ejecutar la consulta SQL

$arrRows = array();
$arryItem = array();
 // Array donde vamos a guardar los datos
while($arr = mysqli_fetch_array($resultado))
{ // Recorrer los resultados de Ejecutar la consulta SQL
    $arryItem["especie"]=$arr["especie"]; // Guardar los resultados en la variable $data
    $arryItem["COUNT(especie)"]=$arr["COUNT(especie)"];   

    $arrRows[] = $arryItem;

}

echo json_encode($arrRows);
?>

