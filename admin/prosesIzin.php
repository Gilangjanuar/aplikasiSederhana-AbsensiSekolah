<?php
include '../connect.php';
$id	= $_GET['NIS'];
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d H:i:s");
$tgl = date("Y-m-d");
$cek1 = mysqli_query($link,"SELECT *FROM kehadiran Where NIS ='$id' and Tanggal like '%$tgl%'");


if(mysqli_num_rows($cek1) > 0){
  echo "<script language=\"Javascript\">alert(\"Anda telah melakukan absensi pada hari ini.\");document.location.href = 'TampilanIzin.php'; </script>";
}
else {
  $hadir = 0;
  $telat = 0;
  $sakit = 0;
  $izin = 1;
  $ver = 0 ;
  $sql 	= "INSERT INTO kehadiran VALUES('$id','$tanggal','$hadir','$telat','$sakit','$izin','$ver')";
  $query	= mysqli_query($link,$sql);
  if($query){
    echo "<script language=\"Javascript\">alert(\"Rekan anda Izin Pada $tanggal.\");document.location.href = 'TampilanIzin.php'; </script>";
  }
  else{
    echo "<script language=\"Javascript\">alert(\"Gagal memasukan absensi.\");document.location.href = 'TampilanIzin.php'; </script>";
  }
}
?>
