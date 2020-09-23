<?php
include '../Connect.php';
$id	= $_GET['NIS'];
$tgl = $_GET['tanggal'];

$sql 	= "UPDATE kehadiran SET verifikasi='1' WHERE NIS='$id' and tanggal like '%$tgl%'";
$query	= mysqli_query($link,$sql);
header('location:kehadiran.php');
?>
