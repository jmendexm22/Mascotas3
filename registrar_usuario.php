<?php

require 'conexion.php';

$json=array();

	if(isset($_GET["usuario"])&&($_GET["email"]) && isset($_GET["password"])  && isset($_GET["apellido"])  && isset($_GET["nombre"])  && isset($_GET["ciudad"])){

		$usuario=$_GET['usuario'];
		$email=$_GET['email'];
		$password=$_GET['password'];
		$apellido=$_GET['apellido'];
		$nombre=$_GET['nombre'];
		$ciudad=$_GET['ciudad'];
		
		
		///$conexion=mysqli_connect($hostname,$username,$password,$database);
		
		/*$conexion=new mysqli($hostname,$database,$username,$password);
		if($conexion->connect_errno){
    		echo "El sitio web está experimentado problemas";
		}*/

		
		$consulta="INSERT INTO usuario(usuario, email, password, apellido, nombre, ciudad) VALUES ('{$usuario}','{$email}','{$password}','{$apellido}', '{$nombre}','{$ciudad}' )";

		$resultado=mysqli_query($conexion,$consulta);
		
		
		if($consulta){
		   $consulta="SELECT * FROM usuario  WHERE usuario='{$usuario}'";
		   $resultado=mysqli_query($conexion,$consulta);

			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}else{
			$results["idUsuario"]='';
			$results["usuario"]='';
			$results["email"]='';
			$results["password"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
		
	}
	else{   
			$results["idUsuario"]='';
		    $results["usuario"]='';
		   	$results["email"]='';
		   	$results["password"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}


?>