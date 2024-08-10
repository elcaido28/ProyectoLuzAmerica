<?php
	include('config/config.php');

	$privilegio =$_POST['privilegio'];

	$ingreso=mysqli_query($con,"INSERT into privilegio (privilegio_dscrp) values ('$privilegio')") or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_privilegios.php");
 ?>
