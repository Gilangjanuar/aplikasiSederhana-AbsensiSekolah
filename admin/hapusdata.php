<?php
include '../Connect.php';
$id	= $_GET['NIS'];
$tgl = $_GET['Tanggal'];

$sql 	= "DELETE FROM kehadiran WHERE NIS like '%$id%' and Tanggal like '%$tgl%' ";
$query	= mysqli_query($link,$sql);
header('location:Kehadiran.php');
?>
