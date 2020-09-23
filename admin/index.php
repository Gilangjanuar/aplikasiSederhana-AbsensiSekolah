<?php include 'ProsesLoginAdmin.php'; ?>
<html>

  <head>
    <title> SMKN 2 Kota Bandung </title>
    <link rel="shortcut icon" href="../img/Logo-SMKN2.png"/>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='../assets/css/bootstrap.css' rel='stylesheet' type='text/css'/>
  </head>
    <body>
      <div class="col-md-12">
  	    <div class="panel panel-info">
  	      <div class="panel-heading">
  	    <table border="0" width="1300" style="text-align:center">
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
        <form name="login" method="post" action="" class="form-horizontal">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="glyphicon glyphicon-user"> </i>
              </span>
                <input type="text" name="admin" placeholder="Masukan Id" class="form-control input-lg text-center" required >
            </div>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="glyphicon glyphicon-lock"> </i>
              </span>
                <input type="password" name="pass" placeholder="Masukan password" class="form-control input-lg text-center" required>
            </div>
        </div>
        <div class="panel-Footer">
            <ul class="pager">
              <li class="previous">
              <button type="button" name="kembali"  class="btn btn-info btn-lg" onclick="window.location = '../index.php'"> <i class="glyphicon glyphicon-home">  </i> Kembali      </button>
              </li>
            <li class="next">
                <button type="submit" name="masuk"  class="btn btn-info btn-lg">  <i class="glyphicon glyphicon-log-in"> </i>  Masuk   </button>
            </li>
        </div>
            </div>
      </div>
    </body>
</html>
