<?php

/*
include 'conexion.php';
$usu_usuario=$_POST['usuario'];
$usu_password=$_POST['password'];

//$usu_usuario="angeloroncal@developeru.net";
//$usu_password="12345678";

$sentencia=$conexion->prepare("SELECT * FROM usuario WHERE usuario=? AND password=?");
$sentencia->bind_param('ss',$usu_usuario,$usu_password);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
         echo json_encode($fila,JSON_UNESCAPED_UNICODE);     
}
$sentencia->close();
$conexion->close();*/

include 'conexion.php';

$json=array();
	if(isset($_GET["usuario"]) && isset($_GET["password"]))
	{
		
		$usuario=$_GET['usuario'];
		$password=$_GET['password'];
		
		$consulta="SELECT idusuario, usuario, password, nombre FROM usuario WHERE usuario= '{$usuario}' AND password = '{$password}'";
		$resultado=mysqli_query($conexion,$consulta);

		if($consulta){
		
			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}

		else{
			$results["idusuario"]='';
			$results["usuario"]='';
			$results["password"]='';
			$results["nombre"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
		
	}
	else{
			$results["idusuario"]='';
		   	$results["usuario"]='';
			$results["password"]='';
			$results["nombre"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>