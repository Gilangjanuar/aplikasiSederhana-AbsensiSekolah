<?php
include '../Connect.php';
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['id'])){
die("<script language=\"Javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href = 'index.php' </script>");
}//jika belum login jangan lanjut..

?>
<html>
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
      <li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span> Home </a></li>
      <li> <a href="murid.php"><span class="glyphicon glyphicon-list"></span> Data Siswa </a> </li>
      <li> <a  href="Kehadiran.php"><span class="glyphicon glyphicon-list-alt"></span> Kehadiran </a> </li>
      <li> <a href="Tampilanizin.php"><span class="glyphicon glyphicon-tasks"></span> Tidak Hadir </a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="glyphicon glyphicon-user"></span>
        <?php
        $queri1 = mysqli_query($link,"SELECT *FROM admin WHERE id LIKE '".$_SESSION['id']."'");
        $nama = mysqli_fetch_array($queri1);
        echo $nama['nama']; ?>
      </a></li>
      <li><a href="ProsesLogoutAdmin.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<nav class="navbar navbar-inverse navbar-fixed-bottom">
    <ul class="nav navbar-nav">
      <li> <a> <span class="glyphicon glyphicon-globe"></span> www.Smkn2bandung.sch.id </a> </li>
      <li> <a> <span class="glyphicon glyphicon-envelope"></span> humas@smkn2bandung.sch.id </a> </li>
      <li> <a> <img src="../img/ig2.png" style="width:4%;"> </img> Smkn2bandung </a> </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li> <a> Copyright © 2018, Kelompok 5 </a> </li>
    </ul>
</nav>
<body>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="../img/SMK2.jpg" alt="Los Angeles" style="width:100%">
      </div>

      <div class="item">
        <img src="../img/smkn2.jpg" alt="Chicago" style="width:100%;">
      </div>

      <div class="item">
        <img src="../img/smkn2(a).jpg" alt="New york" style="width:100%;">
      </div>

    <div class="item">
      <img src="../img/smkn2(b).jpg" alt="d" style="width:100%;">
    </div>

  <div class="item">
    <img src="../img/smkn2(c).jpg" alt="e" style="width:100%;">
  </div>

  <div class="item">
    <img src="../img/smkn2(d).png" alt="f" style="width:100%;">
  </div>
  </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</body>
</html>
