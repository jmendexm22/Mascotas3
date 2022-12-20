<?php

//$objConnect = mysql_connect("localhost","root","");

//$objDB = mysql_select_db("mydb");

require 'conexion.php';

$consulta = "SELECT * FROM m_encotradas  ORDER BY idMEncontradas  ASC ";

///$objQuery = mysqli_query($strSQL) or die(mysqli_error());


$resultado=mysqli_query($conexion,$consulta);

$arrRows = array();

$arryItem = array();

while($arr = mysqli_fetch_array($resultado)) {

$arryItem["idMEncontradas"] = $arr["idMEncontradas"];

$arryItem["genero"] = $arr["genero"];

$arryItem["sexo"] = $arr["sexo"];

$arryItem["direccion"] = $arr["direccion"];

$arryItem["contacto"] = $arr["contacto"];

$arryItem["img"] = $arr["img"];

$arryItem["Usuario_idUsuario"] = $arr["Usuario_idUsuario"];


$arrRows[] = $arryItem;

}

echo json_encode($arrRows);

?>