<?php

//$objConnect = mysql_connect("localhost","root","");

//$objDB = mysql_select_db("mydb");

require 'conexion.php';

$consulta = "SELECT * FROM mascota  ORDER BY idMascota  ASC ";

///$objQuery = mysqli_query($strSQL) or die(mysqli_error());


$resultado=mysqli_query($conexion,$consulta);

$arrRows = array();

$arryItem = array();

while($arr = mysqli_fetch_array($resultado)) {

$arryItem["idMascota"] = $arr["idMascota"];

$arryItem["nombre"] = $arr["nombre"];

$arryItem["direccion"] = $arr["direccion"];

$arryItem["imagen"] = $arr["imagen"];

$arryItem["lat"] = $arr["lat"];

$arryItem["lon"] = $arr["lon"];


$arrRows[] = $arryItem;

}

echo json_encode($arrRows);

?>