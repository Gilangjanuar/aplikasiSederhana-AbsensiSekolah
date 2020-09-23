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
              <li class="active"> <a href="murid.php"> <span class="glyphicon glyphicon-list"></span> Data Siswa </a></li>
              <li> <a href="siswabaru.php"> <span class="glyphicon glyphicon-list"></span> Siswa Baru </a></li>
              <li class="disabled"> <a> <span class="glyphicon glyphicon-list"></span> Edit Siswa </a></li>
              <li class="disabled"> <a> <span class="glyphicon glyphicon-list"></span> Cek Rekap Absen </a></li>
            </ul>
            <form class="navbar-form navbar-right" name="cari" method="GET" action="" >
              <div class="input-group ">
                <div class="input-grup-addon">
                  <input type="text" name="search" class=" input-md text-center cool-sm" placeholder="Cari Nama"> -
                  <input type="text" name="tgl" class=" input-md text-center cool-sm" placeholder="Cari Kelas">
                  <button type="submit" name="cr" class="btn btn-info"><i class="glyphicon glyphicon-search"> </i> Cari </button>
                </div>
              </div>
        </nav>
  <table name="murid" class="table table-responsive" style="text-align:center">
    <tr class="info">
      <th style="text-align:center"> No </th>
      <th style="text-align:center"> NIS </th>
      <th style="text-align:center"> Nama Lengkap </th>
      <th style="text-align:center"> Kelas </th>
      <th colspan="2" style="text-align:center"> Aksi </th>
      <th style="text-align:center"> Rekap Absen </th>
    </tr>
    <?php
    $halaman = 10;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
    $hasil = mysqli_query($link,"SELECT *FROM murid");
    $result = mysqli_num_rows($hasil);
    $pages = ceil($result/$halaman);
    $query = mysqli_query($link,"select *from murid LIMIT $mulai, $halaman");
    $no =$mulai+1;
      if(isset($_GET['cr'])){
        $cari = $_GET['search'];
        $kls = $_GET['tgl'];
        $query = mysqli_query($link,"SELECT *From murid where Namalengkap like '%".$cari."%' and kelas like '%".$kls."%' order by NIS asc LIMIT $mulai, $halaman ");
      }
      else{
      $queri = "Select *from murid order by NIS asc LIMIT $mulai, $halaman"  ;
      $query = mysqli_query($link,$queri) ;
      }


      while ($data = mysqli_fetch_array($query) ){
        echo "<tr>
            <td>".$no++."</td>
            <td>".$data['NIS']."</td>
            <td>".$data['Namalengkap']."</td>
            <td>".$data['Kelas']."</td>
            <td> <a href =Editsiswa.php?NIS=".$data['NIS']." class='btn btn-success btn-sm'><span class='glyphicon glyphicon-edit'></span> Edit </a> </td>
            <td> <a href =hapussiswa.php?NIS=".$data['NIS']." class='btn btn-danger btn-sm' onClick='return confirm(\"Apakah anda yakin menghapusnya?\")'> <i class='glyphicon glyphicon-erase'> </i> Hapus </a> </td>
            <td> <a href =Cekrekap.php?NIS=".$data['NIS']." class='btn btn-info btn-sm'> <span class='glyphicon glyphicon-print'></span> Cetak </a> </td>
          </tr>";
        };

    ?>
</div>
</form>
</table>
<div class="panel-Footer">
  <ul class="pagination">
   <?php for ($i=1; $i<=$pages ; $i++){ ?>
      <li class="active">
        <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?> </a>
  <?php } ?>
</li>
</ul>
</div>


</div>

</div>

</div>
</body>
</html>
