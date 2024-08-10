<?php
	include('config/config.php');

	$cargos =$_POST['cargo'];

	$ingreso=mysqli_query($con,"INSERT into cargo (cargo_dscrp) values ('$cargos')") or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_cargos.php");
 ?>
