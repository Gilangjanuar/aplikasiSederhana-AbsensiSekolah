<?php
  include '../Connect.php';
  if(isset($_POST['Hadir'])){
  $Msk = $_POST['NIS'];
  date_default_timezone_set("Asia/Jakarta");
  $hdr ;
  $telat ;
  $izin ;
  $sakit ;
  $ver ;
  $tanggal = date("Y-m-d H:i:s");
  $tgl = date("Y-m-d");
  $cek = mysqli_num_rows(mysqli_query($link,"SELECT *from kehadiran Where NIS = '$Msk' and Tanggal like '%$tgl%'")) ;

        if($cek > 0) {
          echo "<script language=\"Javascript\">alert(\"Anda Sudah Melakukan Absensi Pada hari ini\");document.location.href = 'TampilanKehadiran.php'; </script>";
        }
    else{
        if($tanggal > date("Y-m-d 07:00:00")){
          $hdr = 0 ;
          $telat = 1 ;
          $izin = 0 ;
          $sakit = 0;
          $ver = 1 ;
          if(mysqli_query($link,"INSERT INTO kehadiran VALUES('$Msk','$tanggal','$hdr','$telat','$sakit','$izin','$ver')")) {
            echo "<script language=\"Javascript\">alert(\"Anda masuk pada $tanggal.\");document.location.href = 'TampilanKehadiran.php'; </script>";
          }
          else {
            echo "<script language=\"Javascript\">alert(\"NIS tidak terdaftar Silahkan hubungi Administartor\");document.location.href = 'TampilanKehadiran.php'; </script>";
          }
        }
        else{
          $hdr = 1 ;
          $telat = 0 ;
          $izin = 0 ;
          $sakit = 0 ;
          $ver = 1 ;
          if(mysqli_query($link,"INSERT INTO kehadiran VALUES('$Msk','$tanggal','$hdr','$telat','$sakit','$izin','$ver')")) {
          echo "<script language=\"Javascript\">alert(\"Anda masuk pada $tanggal.\");document.location.href = 'TampilanKehadiran.php'; </script>";
        }
          else {
          echo "<script language=\"Javascript\">alert(\"NIS tidak terdaftar Silahkan hubungi Administartor\");document.location.href = 'TampilanKehadiran.php'; </script>";
        }

      }
  }
}
?>
