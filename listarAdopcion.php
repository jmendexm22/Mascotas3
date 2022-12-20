<?php

//$objConnect = mysql_connect("localhost","root","");

//$objDB = mysql_select_db("mydb");

require 'conexion.php';

$consulta = "SELECT * FROM madopcion  ORDER BY idMAdopcion  ASC ";

///$objQuery = mysqli_query($strSQL) or die(mysqli_error());


$resultado=mysqli_query($conexion,$consulta);

$arrRows = array();

$arryItem = array();

while($arr = mysqli_fetch_array($resultado)) {

$arryItem["idMAdopcion"] = $arr["idMAdopcion"];

$arryItem["raza"] = $arr["raza"];

$arryItem["sexo"] = $arr["sexo"];

$arryItem["edad"] = $arr["edad"];

$arryItem["img"] = $arr["img"];


$arryItem["Usuario_idUsuario"] = $arr["Usuario_idUsuario"];


$arrRows[] = $arryItem;

}

echo json_encode($arrRows);

?>