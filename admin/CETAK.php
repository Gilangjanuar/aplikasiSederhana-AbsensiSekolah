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
      <li class="active"> <a href="murid.php"><span class="glyphicon glyphicon-list"></span> Data Siswa </a> </li>
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
<body onload="window.print();">

<?php
  include "../Connect.php";
  if(isset($_POST['Cetak'])){
   $NIS = $_POST['NIS'];
   $nama = $_POST['nama'];
   $kls = $_POST['kls'];
   $jumlah = $_POST['jml'];
   $hadir = $_POST['hadir'];
   $telat = $_POST['telat'];
   $sakit = $_POST['sakit'];
   $izin = $_POST['izin'];

   $alpa = $jumlah - $hadir - $sakit - $izin ;
   $persentase = $hadir / $jumlah * 100 ;
?>
<div class="container">
  <div class="col-md-12">
    <div class="panel">
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
  <hr>
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
        <h1> REKAP ABSEN SISWA </h1>
        <table border="0" class="table-responsive" width="750">
           <tr>
            <td> <h3> NIS </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <h3> <?php echo $NIS ; ?> </h3> </td>
          </tr>
          <tr>
            <td> <h3> Nama Lengkap </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <h3> <?php echo $nama ; ?> </h3> </td>
          </tr>
          <tr>
            <td> <h3> Kelas </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <h3> <?php echo $kls ; ?> </h3> </td>
          </tr>
          <tr>
            <td> <h3> Terlambat </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <h3> <?php echo $telat." Hari " ; ?> </h3> </td>
          </tr>
          <tr>
            <td> <h3> Sakit </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <h3> <?php echo $sakit." Hari " ; ?> </h3></td>
          </tr>
          <tr>
            <td> <h3> Izin </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <h3> <?php echo $izin." Hari " ; ?> </h3> </td>
          </tr>
          <tr>
            <td> <h3> Tanpa Keterangan </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <h3> <?php echo $alpa." Hari " ; ?> </h3> </td>
          </tr>
          <tr>
            <td> <h3> Persentase Kehadiran </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <h3> <?php echo $persentase." % " ; ?> </h3> </td>
          </tr>
        </table>
    <?php } ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    Tanda tangan,
    <table width="1600">
      <tr>
        <td> <h3> Orang Tua, </h3> </td>
        <td> <h3> Wali Kelas, </h3> </td>
      </tr>
      <tr>
        <td> <br> <br> <br> <br> <br> <h3> _____________ </h3> </td>
        <td> <br> <br> <br> <br> <br> <h3> _____________ </h3> </td>
      </tr>
    </table>
    <br>
    <center>
      <h3>
        Mengetahui
        <br>
        Kepala Sekolah
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <u> Drs. Tatang Gunawan, M,M.Pd </u>
        <br>
        NIP.196303271988031008
      </h3>
    </center>
      </div>
      </div>
      </div>
      </div>
      </body>
      </html>
