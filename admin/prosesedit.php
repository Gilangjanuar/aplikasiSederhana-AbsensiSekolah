<?php
  include "../Connect.php";
  if(isset($_POST['edit'])){
  $NISlm = $_POST['id'];
   $NIS = $_POST['NIS'];
   $nama = $_POST['nama'];
   $kls = $_POST['kls'];
   $simpan = mysqli_query($link,"UPDATE murid SET NIS='$NIS',Namalengkap='$nama', Kelas='$kls' WHERE NIS ='$NISlm'");

   $query = mysqli_query($link,"SELECT *FROM murid where NIS ='$NIS'");
   $cek = mysqli_num_rows($query);
        if($simpan) {
         echo "<script language=\"Javascript\">alert(\"Data Berhasil Dimasukan\");document.location.href = 'murid.php'; </script>";
       } else {
         echo "<script language=\"Javascript\">alert(\"Data Gagal dimasukan\");document.location.href = 'Editsiswa.php'; </script>";
       }
     }

?>
