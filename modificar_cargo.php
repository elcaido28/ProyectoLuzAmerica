<?php
include('config/config.php');

	$idc=$_REQUEST['id'];
	$cargo=$_POST['cargo'];

	$modificar="UPDATE cargo SET cargo_dscrp='$cargo' WHERE cargo_id='$idc'";

	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_cargos.php");
 ?>
