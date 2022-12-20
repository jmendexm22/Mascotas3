<?php

//$objConnect = mysql_connect("localhost","root","");

//$objDB = mysql_select_db("mydb");

require 'conexion.php';

$consulta = "SELECT id,titulo,categoria,foto from productos";

///$objQuery = mysqli_query($strSQL) or die(mysqli_error());


$resultado=mysqli_query($conexion,$consulta);

$arrRows = array();

$arryItem = array();

while($arr = mysqli_fetch_array($resultado)) {

$arryItem["id"] = $arr["id"];

$arryItem["titulo"] = $arr["titulo"];

$arryItem["categoria"] = $arr["categoria"];

$arryItem["foto"] = $arr["foto"];




$arrRows[] = $arryItem;

}

echo json_encode($arrRows);
?>