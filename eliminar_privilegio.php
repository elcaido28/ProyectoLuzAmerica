<?php
include('config/config.php');
$id=$_REQUEST['id'];

mysqli_query($con,"DELETE from privilegio where privilegio_id='$id'");
header('Location:ingreso_privilegios.php');
?>
