<?php
include('config/config.php');

	$idp=$_REQUEST['id'];
	$privilegio=$_POST['privilegio'];

	$modificar="UPDATE privilegio SET privilegio_dscrp='$privilegio' WHERE privilegio_id='$idp'";

	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_privilegios.php");
 ?>
