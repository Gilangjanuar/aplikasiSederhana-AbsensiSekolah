<?php
  include "../Connect.php";
  if(isset($_POST['tambah'])){
   $NIS = $_POST['NIS'];
   $nama = $_POST['nama'];
   $kelas = $_POST['kls'];
   $cek = mysqli_query($link,"SELECT *FROM murid where NIS='$NIS'");

  $simpan = mysqli_query($link,"INSERT INTO murid VALUES('$NIS','$nama','$kelas')");
  if(mysqli_num_rows($cek)>0){
       echo "<script language=\"Javascript\">alert(\"NIS telah digunakan harap ganti NIS\");document.location.href = 'siswabaru.php'; </script>";
  }
  else {
       if($simpan) {
         echo "<script language=\"Javascript\">alert(\"Data Berhasil Dimasukan\");document.location.href = 'murid.php'; </script>";
       } else {
         echo "<script language=\"Javascript\">alert(\"Data Gagal dimasukan\");document.location.href = 'siswabaru.php'; </script>";
       }
     }
   }

?>
