<?php
    
     if($_SERVER['REQUEST_METHOD']=='POST'){

     
        $genero = $_POST["raza"];
        $sexo = $_POST["sexo"];
        $edad = $_POST["edad"];
        $contacto = $_POST["contacto"];
        $imagen = $_POST["foto"];
        $idusuario = $_POST["Idusuario"];
    
        require_once('conexion.php');

       $sql="SELECT idMAdopcion FROM madopcion ORDER BY idMAdopcion ASC";
       $res = mysqli_query($conexion,$sql);
        $idMAdopcion = 0;

        while($row = mysqli_fetch_array($res)){
            $idMAdopcion = $row['idMAdopcion'];
        }

        
         $path = "MAupload/$idMAdopcion.png";
 
         $actualpath ="http://192.168.0.16:8080/Mascotas3/$path";
 
        
    	$sql="INSERT INTO madopcion (raza,sexo,edad,contacto,img,Usuario_idUsuario)
         VALUES ('{$genero}','{$sexo}','{$edad}','{$contacto}','{$actualpath}','{$idusuario}')";

        if(mysqli_query($conexion,$sql)){
            file_put_contents($path, base64_decode($imagen));
            echo "Subio imagen Correctamente";
        }               
  
        mysqli_close($conexion);
        
        
        }else{
            echo "Error";
        }
?>