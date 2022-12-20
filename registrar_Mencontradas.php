<?php
    
     if($_SERVER['REQUEST_METHOD']=='POST'){

     
        $genero = $_POST["especie"];
        $sexo = $_POST["sexo"];
        $contacto = $_POST["contacto"];
        $direccion = $_POST["direccion"];
        $imagen = $_POST["foto"];
        $idusuario = $_POST["Idusuario"];
    
        require_once('conexion.php');

       $sql="SELECT idMEncontradas FROM m_encotradas ORDER BY idMEncontradas ASC";
       $res = mysqli_query($conexion,$sql);
        $idMascota = 0;

        while($row = mysqli_fetch_array($res)){
            $idMascota = $row['idMEncontradas'];
        }

        
         $path = "Mupload/$idMascota.png";
 
         $actualpath ="http://192.168.0.7:8080/Mascotas3/$path";
 
        
    	$sql="INSERT INTO m_encotradas (genero,sexo,direccion,contacto,img,Usuario_idUsuario)
         VALUES ('{$genero}','{$sexo}','{$direccion}','{$contacto}','{$actualpath}','{$idusuario}')";

        if(mysqli_query($conexion,$sql)){
            file_put_contents($path, base64_decode($imagen));
            echo "Subio imagen Correctamente";
        }               
  
        mysqli_close($conexion);
        
        
        }else{
            echo "Error";
        }
?>