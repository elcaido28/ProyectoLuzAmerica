<?php
	include('config/config.php');
	$fecha=date('Y-m-d');

 	if ($_FILES["foto"]["name"]!="") {
   		$foto=$_FILES["foto"]["name"];
   		$ruta=$_FILES["foto"]["tmp_name"];
   		$logo="img_usuarios/".$foto;
   		copy($ruta,$logo);
 	}else {
   		$result2= mysqli_query($con,"SELECT * from profesor where cedula='$cedula'");
   		$row2= mysqli_fetch_assoc($result2);
   		$logo=$row2['foto'];
	}

	$cedula=$_POST['cedula'];
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$telefono=$_POST['telefono'];
	$fecha_naci=$_POST['fecha_naci'];
	$cargo=$_POST['cargo'];
	$privilegio =$_POST['privilegio'];
	$estado="1";
	
	$ingreso=mysqli_query($con,"INSERT into empleados (fecha_ingreso, fecha_modificacion, foto, cedula, nombre, apellido, telefono, fecha_nacimiento, cargo, privilegio, estado) values
('$fecha','$fecha','$logo','$cedula','$nombres','$apellidos','$telefono','$fecha_naci','$cargo','$privilegio','$estado')") or die ("error".mysqli_error());


	// $ingreso=mysqli_query($con,"INSERT into usuarios (cedula,clave,id_privilegio,id_estado) values ('$cedula','$correo','3','$estado')") or die ("error".mysqli_error());


	mysqli_close($con);
	header("Location:ingreso_empleados.php");
 ?>
