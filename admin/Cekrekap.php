<html>
<?php
include "../connect.php";
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['id'])){
die("<script language=\"Javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href = 'index.php' </script>");
}//jika belum login jangan lanjut..

?>
<head>
  <title> SMKN 2 Kota Bandung </title>
  <link rel="shortcut icon" href="../img/Logo-SMKN2.png"/>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='../assets/css/bootstrap.css' rel='stylesheet' type='text/css'/>
</head>
<!-- Membuat Navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand"> SMK Negeri 2 Bandung </img></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="beranda.php"><span class="glyphicon glyphicon-home"></span> Home </a></li>
      <li class="active"> <a><span class="glyphicon glyphicon-list"></span> Data Siswa </a> </li>
      <li> <a href="Kehadiran.php"><span class="glyphicon glyphicon-list-alt"></span> Kehadiran </a> </li>
      <li> <a href="TampilanIzin.php"><span class="glyphicon glyphicon-tasks"></span> Tidak Hadir </a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="glyphicon glyphicon-user"></span>
        <?php
        $queri1 = mysqli_query($link,"SELECT *FROM admin WHERE Id LIKE '".$_SESSION['id']."'");
        $nama = mysqli_fetch_array($queri1);
        echo $nama['nama']; ?>
      </a></li>
      <li><a href="ProsesLogoutAdmin.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<body>
  <br>
  <br>
  <br>
<?php
  include "../Connect.php" ;
    $id = $_GET['NIS'];
  	$lihat = mysqli_query($link,"SELECT * FROM murid WHERE NIS='$id'");
  	$data = mysqli_fetch_array($lihat);

    $hadir = mysqli_query($link,"SELECT SUM(hadir+telat) as kehadiran from jmlkehadiran WHERE NIS='$id' and Verifikasi='1'");
    $jmlhadir = mysqli_fetch_array($hadir);

    $telat = mysqli_query($link,"SELECT SUM(telat) as terlambat from jmlkehadiran WHERE NIS='$id' and Verifikasi='1'");
    $jmltelat = mysqli_fetch_array($telat);

    $sakit = mysqli_query($link,"SELECT SUM(sakit) as skt from jmlkehadiran WHERE NIS='$id' and Verifikasi='1'");
    $jmlsakit = mysqli_fetch_array($sakit);

    $izin = mysqli_query($link,"SELECT SUM(izin) as izn from jmlkehadiran WHERE NIS='$id' and Verifikasi='1'");
    $jmlizin = mysqli_fetch_array($izin);

  ?>

<div class="container">
  <div class="col-md-12">
    <div class="panel panel-info">
      <div class="panel-heading">
    <table border="0" width="1050" style="text-align:center">
      <tr>
        <td> <img src="../img/Logo-SMKN2.png" height="200" width="200"> </img> </td>
        <td> <h1> SMK Negeri 2 Bandung </h1><br>
        Jalan Ciliwung Nomor 4,Telepon 022-7234285, <br>
        Faksimil 022-4231857, Website  www.smkn2bandung.sch.id <br>
        email : humas@smkn2bandung.sch.id <br>
        Kota Bandung - 40114 </td>
        <td> <img src="../img/Logo3.PNG" height="200" width="200"> </img> </td>
      </tr>
    </table>
  </div>
      <div class="panel-body">
        <nav class="navbar navbar-default navbar-top">
          <div class="container-fluid">
            <ul class="nav navbar-nav">
              <li> <a href="murid.php"> <span class="glyphicon glyphicon-list"></span> Data Siswa </a></li>
              <li> <a href="siswabaru.php"> <span class="glyphicon glyphicon-list"></span> Siswa Baru </a></li>
              <li class="disabled"> <a> <span class="glyphicon glyphicon-list"></span> Edit Siswa </a></li>
              <li class="active"> <a> <span class="glyphicon glyphicon-list"></span> Cek Rekap Absen </a></li>
            </ul>
          </div>
        </nav>
        <h1> DATA REKAP ABSEN SISWA </h1>
      <form method="POST" action="CETAK.php">
        <table border="0" class="table-responsive">
          <tr>
            <td> <h3> NIS </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="NIS" class="form-control input-lg" value="<?php echo $data['NIS'] ; ?>" readonly> </input> </td>
          </tr>
          <tr>
            <td> <h3> Nama Lengkap </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="nama" class="form-control input-lg" value="<?php echo $data['Namalengkap'] ; ?>" readonly> </td>
          </tr>
          <tr>
            <td> <h3> Kelas </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="kls" class="form-control input-lg" value="<?php echo $data['Kelas'] ; ?>" readonly> </td>
            <tr>
          </tr>
            <td> <h3> Jumlah Hari masuk semester </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="jml" class="form-control input-lg" value=""></td>
            <td>  <h4> Hari </h4> </td>
          </tr>
          <tr>
            <td> <h3> Hadir </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="hadir" class="form-control input-lg" value="<?php echo $jmlhadir['kehadiran'] ; ?>" readonly > </td>
            <td>  <h4> Hari </h4> </td>
          </tr>
          <tr>
            <td> <h3> Terlambat </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="telat" class="form-control input-lg" value="<?php echo $jmltelat['terlambat'] ; ?>" readonly> </td>
            <td>  <h4> Hari </h4> </td>
          </tr>
          <tr>
            <td> <h3> Sakit </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="sakit" class="form-control input-lg" value="<?php echo $jmlsakit['skt'] ; ?>" readonly> </td>
            <td>  <h4> Hari </h4> </td>
          </tr>
          <tr>
            <td> <h3> Izin </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="izin" class="form-control input-lg" value="<?php echo $jmlizin['izn'] ; ?>" readonly></td>
            <td>  <h4> Hari </h4> </td>
          </tr>
          <tr>
            <td colspan="3" style="text-align:right"> <button type="submit" name="Cetak" class="btn btn-info ">  <i class="glyphicon glyphicon-print"> </i>  Cetak  </button> </td>
          </tr>
        </table>
      </form>

      </div>
    </div>
  </div>
</div>
</body>
</html>
