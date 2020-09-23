<?php
  include "../connect.php";

  if (isset($_POST['masuk'])) {
    $user = $_POST['admin'];
    $pass = md5($_POST['pass']);

    $cek = mysqli_num_rows(mysqli_query($link,"Select *from admin where Id = '$user' and Password='$pass' "));
    $data = mysqli_fetch_array(mysqli_query($link,"Select *from admin where Id= '$user' and Password='$pass' "));



      if($cek > 0) {
        session_start();
        $_SESSION['id'] = $data['id'] ;
        echo "<script language=\"Javascript\">alert(\"Selamat Datang\");document.location.href = 'beranda.php'; </script>";
      }
      else {
        echo "<script language=\"Javascript\">alert(\"Username atau Password Salah!!!!\");document.location.href = '../admin/index.php'; </script>";
      }
  }
  elseif (isset($_POST['kembali'])) {
    header('location../index.php');
  }
?>
