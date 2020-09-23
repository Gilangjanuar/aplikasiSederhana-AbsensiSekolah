<?php
  session_start();
  session_destroy();

    echo "<script language=\"Javascript\">alert(\"Anda Berhasil Keluar\");document.location.href = '../index.php'; </script>";

 ?>
