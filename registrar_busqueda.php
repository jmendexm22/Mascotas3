
<?php
    
     if($_SERVER['REQUEST_METHOD']=='POST'){

        $nombre = $_POST["nombre"];
        $especie = $_POST["especie"];
        $genero = $_POST["genero"];
        $edad = $_POST["edad"];
        $imagen = $_POST["foto"];
        $direccion = $_POST["direccion"];
        $contacto = $_POST["contacto"];
        $correo = $_POST["correo"];
        $lat = $_POST["Lat"];
        $lon  = $_POST["Lon"];
        $idusuario = $_POST["Idusuario"];
    
        require_once('conexion.php');

       $sql="SELECT idMascota FROM mascota ORDER BY idMascota ASC";
       $res = mysqli_query($conexion,$sql);
        $idMascota = 0;

        while($row = mysqli_fetch_array($res)){
            $idMascota = $row['idMascota'];
        }

        
         $path = "upload/$idMascota.png";
 
         $actualpath ="http://192.168.0.5:8080/Mascotas3/$path";
 
        
    	$sql="INSERT INTO mascota(nombre,especie,genero,edad,imagen,direccion,contacto,correo,lat, lon, Usuario_idUsuario)
         VALUES ('{$nombre}','{$especie}','{$genero}','{$edad}','{$actualpath}','{$direccion}','{$contacto}','{$correo}','{$lat}','{$lon}','{$idusuario}')";

        if(mysqli_query($conexion,$sql)){
            file_put_contents($path, base64_decode($imagen));
            echo "Subio imagen Correctamente";
        }               
  
        mysqli_close($conexion);
        
        
        }else{
            echo "Error";
        }
?>