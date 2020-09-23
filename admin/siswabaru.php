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
<?php $queri2 = mysqli_query($link,"SELECT max(NIS) as maxNIS FROM murid");
$code = mysqli_fetch_array($queri2);
$codeR = $code['maxNIS'];
$codeR++ ?>
<body>
  <br>
  <br>
  <br>

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
              <li class="active"> <a> <span class="glyphicon glyphicon-list"></span> Siswa Baru </a></li>
              <li class="disabled"> <a> <span class="glyphicon glyphicon-list"></span> Edit Siswa </a></li>
              <li class="disabled"> <a> <span class="glyphicon glyphicon-list"></span> Cek Rekap Absen </a></li>
            </ul>
          </div>
        </nav>
        <h1> DATA SISWA BARU </h1>
      <form method="POST" action="prosessiswabaru.php">
        <table border="0" class="table-responsive">
          <tr>
            <td> <h3> NIS </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="NIS" class="form-control input-lg" value="<?php echo $codeR ; ?>" required> </input> </td>
          </tr>
          <tr>
            <td> <h3> Nama Lengkap </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="nama" class="form-control input-lg" required> </td>
          </tr>
          <tr>
            <td> <h3> Kelas </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <select name="kls" class="form-control" required>
                    <option value="X - TM1"> X-TM 1 </option>
                    <option value="X - TM2"> X-TM 2 </option>
                    <option value="X - TM3"> X-TM 3 </option>
                    <option value="X - TM4"> X-TM 4 </option>
                    <option value="X - TM5"> X-TM 5 </option>
                    <option value="X - TM6"> X-TM 6 </option>
                    <option value="X - TM7"> X-TM 7 </option>
                    <option value="X - TM8"> X-TM 8 </option>
                    <option value="X - TM9"> X-TM 9 </option>
                    <option value="X - TM10"> X-TM 10 </option>
                    <option value="XI - TP 1"> XI-TP 1 </option>
                    <option value="XI - TP 2"> XI-TP 2 </option>
                    <option value="XI - TP 3"> XI-TP 3 </option>
                    <option value="XI - TP 4"> XI-TP 4 </option>
                    <option value="XI - TGM 1"> XI-TGM 1 </option>
                    <option value="XI - TGM 2"> XI-TGM 2 </option>
                    <option value="XI - TGM 3"> XI-TGM 3 </option>
                    <option value="XI - TFL"> XI-TFL  </option>
                    <option value="XI - TPL"> XI-TPL </option>
                    <option value="XI - TKJ 1"> XI-TKJ 1 </option>
                    <option value="XI - TKJ 2"> XI-TKJ 2 </option>
                    <option value="XI - RPL 1"> XI-RPL 1 </option>
                    <option value="XI - RPL 2"> XI-RPL 2 </option>
                    <option value="XI - MM"> XI-MM </option>
                    <option value="XI - AM"> XI-AM </option>
                    <option value="XII - TP 1"> XII-TP 1 </option>
                    <option value="XII - TP 2"> XII-TP 2 </option>
                    <option value="XII - TP 3"> XII-TP 3 </option>
                    <option value="XII - TP 4"> XII-TP 4 </option>
                    <option value="XII - TGM 1"> XII-TGM 1 </option>
                    <option value="XII - TGM 2"> XII-TGM 2 </option>
                    <option value="XII - TFL"> XII-TFL  </option>
                    <option value="XII - TPL"> XII-TPL </option>
                    <option value="XII - TKJ 1"> XII-TKJ 1 </option>
                    <option value="XII - TKJ 2"> XII-TKJ 2 </option>
                    <option value="XII - RPL 1"> XII-RPL 1 </option>
                    <option value="XII - RPL 2"> XII-RPL 2 </option>
                    <option value="XII - MM"> XII-MM </option>
                    <option value="XII - AM"> XII-AM </option>

                </select>
             </td>
          </tr>
          <tr>
            <td colspan="3" style="text-align:right"> <button type="submit" name="tambah" class="btn btn-info ">  <i class="glyphicon glyphicon-plus"> </i>  Simpan  </button> </td>
          </tr>
        </table>
      </form>

      </div>
    </div>
  </div>
</div>
</body>
</html>
