<?php 

 if($_SERVER['REQUEST_METHOD']=='POST'){
 
$imagen= $_POST["foto"];
$nombre = $_POST["nombre"];
 
 require_once('conexion.php');
 
 $sql ="SELECT id FROM mascotas ORDER BY id ASC";
 $res = mysqli_query($conexion,$sql);
 $id = 0;
 
 while($row = mysqli_fetch_array($res)){
 $id = $row['id'];
 }
 
 $path = "upload/$id.png";
 
 $actualpath ="C:/xampp/htdocs/Mascotas3/upload/$path";
 
 $sql = "INSERT INTO mascotas (img,nombre) VALUES ('{$actualpath}','{$nombre}')";
 
 if(mysqli_query($conexion,$sql)){
 file_put_contents($path,base64_decode($imagen));
 echo "Subio imagen Correctamente";
 }
 
 mysqli_close($conexion);
 }else{
 echo "Error";
 }
////// IE42411900 11565
////// 1000 mami
////// 

 ?>