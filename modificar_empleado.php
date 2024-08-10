<?php
include('config/config.php');

	$idpro=$_REQUEST['id'];
	$fecha=date('Y-m-d');

	$cedula=$_POST['cedula'];
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$telefono=$_POST['telefono'];
	$fecha_naci=$_POST['fecha_naci'];
	$cargo=$_POST['cargo'];
	$privilegio =$_POST['privilegio'];
	$estado="1";
	if ($_FILES["foto"]["name"]!="") {
   		$foto=$_FILES["foto"]["name"];
   		$ruta=$_FILES["foto"]["tmp_name"];
   		$logo="img_usuarios/".$foto;
   		copy($ruta,$logo);
 	}else {
   		$result2= mysqli_query($con,"SELECT * from empleados where cedula='$cedula'");
   		$row2= mysqli_fetch_assoc($result2);
   		$logo=$row2['foto'];
	}

	$modificar="UPDATE empleados SET fecha_modificacion=$fecha, foto='$logo', cedula='$cedula', nombre='$nombres', apellido='$apellidos', telefono='$telefono', fecha_nacimiento='$fecha_naci', cargo='$cargo', privilegio='$privilegio' WHERE id_empleados='$idpro'";

	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:editar_empleado.php?ide=$idpro");
 ?>
