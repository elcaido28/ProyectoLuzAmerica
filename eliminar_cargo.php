<?php
include('config/config.php');
$id=$_REQUEST['id'];

mysqli_query($con,"DELETE from cargo where cargo_id='$id'");
header('Location:ingreso_cargos.php');
?>
