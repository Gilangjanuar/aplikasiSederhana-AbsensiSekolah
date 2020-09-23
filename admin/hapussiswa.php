<?php
include '../Connect.php';
$id	= $_GET['NIS'];

$sql 	= "DELETE FROM murid WHERE NIS='$id'";
$query	= mysqli_query($link,$sql);
header('location:murid.php');
?>
