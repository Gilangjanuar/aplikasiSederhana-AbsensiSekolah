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
      <li> <a href="murid.php"><span class="glyphicon glyphicon-list"></span> Data Siswa </a> </li>
      <li class="active"> <a><span class="glyphicon glyphicon-list-alt"></span> Kehadiran </a> </li>
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
            <form class="navbar-form navbar-right" name="cari" method="GET" action="" >
              <div class="input-group ">
                <div class="input-grup-addon">
                  <input type="text" name="search" class=" input-md text-center cool-sm" placeholder="Cari Nama"> -
                  <input type="date" name="tgl" class=" input-md text-center cool-sm" placeholder="Masukan Tanggal">
                  <button type="submit" name="cr" class="btn btn-info"><i class="glyphicon glyphicon-search"> </i> Cari </button>
                </div>
              </div>
        </nav>
  <table name="murid" class="table table-responsive">
    <tr class="info">
      <th> No </th>
      <th> NIS </th>
      <th> Nama Lengkap </th>
      <th> Kelas </th>
      <th> Tanggal & Waktu </th>
      <th> Hadir </th>
      <th> Telat </th>
      <th> Izin </th>
      <th> Sakit </th>
      <th> Status </th>
      <th> Hapus </th>

    </tr>
    <?php
    $halaman = 10;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
    $hasil = mysqli_query($link,"SELECT *FROM jmlkehadiran");
    $result = mysqli_num_rows($hasil);
    $pages = ceil($result/$halaman);
    $no =$mulai+1;
      if(isset($_GET['cr'])){
        $cari = $_GET['search'];
        $hari = $_GET['tgl'];
        $query = mysqli_query($link,"SELECT *From jmlkehadiran where Namalengkap like '%".$cari."%' and Tanggal like '%".$hari."%' order by tanggal desc LIMIT $mulai, $halaman");
      }
      else{
      $query = mysqli_query($link,"SELECT *from jmlkehadiran order by tanggal desc LIMIT $mulai, $halaman")  ;
      }

      while ($data = mysqli_fetch_array($query) ){
          if($data['Hadir'] == 1){
          $hadir = "<span class='glyphicon glyphicon-ok'> </span>";
          $telat = " ";
          $sakit = " ";
          $izin = " ";
          $ver= " ";
        }
          elseif($data['Telat'] == 1){
            $hadir = " " ;
            $telat = "<span class='glyphicon glyphicon-ok'> </span>";
            $sakit = " ";
            $izin = " ";
            $ver= " ";
        }
        elseif($data['Izin'] == 1){
          $hadir = " " ;
          $telat = "";
          $sakit = " ";
          $izin = "<span class='glyphicon glyphicon-ok'> </span>";
          if($data['Verifikasi'] == 0){
            $ver = "<a href =verifikasi.php?NIS=".$data['NIS']."&&tanggal=".$data['Tanggal']." class='btn btn-success btn-sm'> Verifikasi </a> </td>" ;
          }
          else{
            $ver = "Sudah Di verifikasi" ;
          }
      }
        elseif($data['Sakit'] == 1){
          $hadir = " " ;
          $telat = "";
          $sakit = "<span class='glyphicon glyphicon-ok'> </span> ";
          $izin = " ";
          if($data['Verifikasi'] == 0){
            $ver = "<a href =verifikasi.php?NIS=".$data['NIS']."&&tanggal=".$data['Tanggal']." class='btn btn-success btn-sm'> Verifikasi </a> </td>" ;
          }
          else{
            $ver = "Sudah Di verifikasi" ;
          }
    }
          else{
            $hadir = " " ;
            $telat = " " ;
            $sakit = " ";
            $izin = " ";
            if($data['Verifikasi'] == 0){
              $ver = "<a href =verifikasi.php?NIS=".$data['NIS']."&&".$data['Tanggal']." class='btn btn-success btn-sm'> Verifikasi </a> </td>" ;
            }
            else{
              $ver = "Sudah Di verivikasi";
            }
        }
        echo "<tr>
            <td>".$no++."</td>
            <td>".$data['NIS']."</td>
            <td>".$data['Namalengkap']."</td>
            <td>".$data['Kelas']."</td>
            <td>".$data['Tanggal']."</td>
            <td>".$hadir."</td>
            <td>".$telat."</td>
            <td>".$izin."</td>
            <td>".$sakit."</td>
            <td>".$ver."</td>
            <td> <a href =hapusdata.php?NIS=".$data['NIS']."&&Tanggal=".$data['Tanggal']." class='btn btn-danger btn-sm' onClick='return confirm(\"Apakah anda yakin menghapusnya?\")'><span class='glyphicon glyphicon-erase'> </span> Hapus Data </a> </td>
          </tr>";
        };

    ?>
</div>
</form>
</table>
<div class="panel-Footer">
  <ul class="pagination">
    <li>
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

  <?php } ?>
</li>
</ul>
</div>

</div>

</div>

</div>
</body>
</html>
