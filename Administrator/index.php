<?php
  session_start();
  if(!isset($_SESSION['admin'])) {
  header('location:beranda.php'); }
  else { $id = $_SESSION['admin']; }
  require_once("koneksi.php");
  $query = mysqli_query($koneksi,"SELECT * FROM users WHERE username = '$id'");
  $hasil11 = mysqli_fetch_array($query);
?>
<!doctype html>
<html lang="en">
<head>
<title>Gudang Material | PT. PLN Sektor Pembangkitan Pekanbaru</title>
<meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
<meta content="pln" name="author"/>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet">

 <link rel="stylesheet" href="css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

<!--new-->
<link rel="stylesheet" type="text/css" href="./assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/flat-admin.css">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/yellow.css">
<style>

</style>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
<div class="app app-default">

<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="#"><span class="highlight">PLN SPKB</span> Admin</a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
      <li class="active">
        <a href="./index.php">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Dashboard</div>
        </a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <div class="icon">
            <i class="fa fa-cube" aria-hidden="true"></i>
          </div>
          <div class="title">Master Data</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Master Data</li>
            <li><a href="kategori.php">Kategori</a></li>
            <li><a href="material.php">Material</a></li>
          </ul>
        </div>
      </li>
	  <li>
        <a href="./profile.php">
          <div class="icon">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
          <div class="title">Profile</div>
        </a>
      </li>
	  <?php 
	  if($hasil11['level']=="admin"){ ?>
	  <li>
        <a href="./users.php">
          <div class="icon">
            <i class="fa fa-users" aria-hidden="true"></i>
          </div>
          <div class="title">All Users</div>
        </a>
      </li>
	  <?php } else {} ?>
	  <li>
        <a href="../" target="_blank">
          <div class="icon">
            <i class="fa fa-globe" aria-hidden="true"></i>
          </div>
          <div class="title">View Site</div>
        </a>
      </li>
    </ul>
  </div>
  
</aside>

<script type="text/ng-template" id="sidebar-dropdown.tpl.html">
  <div class="dropdown-background">
    <div class="bg"></div>
  </div>
  <div class="dropdown-container">
    {{list}}
  </div>
</script>
<div class="app-container">

  <nav class="navbar navbar-default" id="navbar">
  <div class="container-fluid">
    <div class="navbar-collapse collapse in">
      <ul class="nav navbar-nav navbar-mobile">
        <li>
          <button type="button" class="sidebar-toggle">
            <i class="fa fa-bars"></i>
          </button>
        </li>
        <li class="logo">
          <a class="navbar-brand" href="#"><span class="highlight">PLN SPKB</span> Admin</a>
        </li>
        <li>
          <button type="button" class="navbar-toggle">
            <img class="profile-img" src="./assets/images/profile.png">
          </button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-left">
        <li class="navbar-title">Dashboard | Aplikasi Gudang Material</li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown profile">
          <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
            <?php if($hasil11['level']=="admin"){?>
			<img class="profile-img" src="./assets/images/admin.png">
			<?php } else { ?>
			<img class="profile-img" src="./assets/images/user.png">
			<?php } ?>
            <div class="title">Profile</div>
          </a>
          <div class="dropdown-menu">
            <div class="profile-info">
              <h4 class="username"><?php echo $hasil11['nama'];?> (<?php echo $hasil11['level'];?>)</h4>
            </div>
            <ul class="action">
              <li>
                <a href="profile.php">
                  Profile
                </a>
              </li>
              <li>
                <a href="logout.php" class="logout">
                  Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="btn-floating" id="help-actions">
  <div class="btn-bg"></div>
  <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
    <i class="icon fa fa-plus"></i>
    <span class="help-text">Shortcut</span>
  </button>
  <div class="toggle-content">
    <ul class="actions">
      <li><a href="kategori.php">Kategori <i class="fa fa-list" aria-hidden="true"></i></a></li>
      <li><a href="material.php">Material <i class="fa fa-bolt" aria-hidden="true"></i></a></li>
	  <?php 
	  if($hasil11['level']=="admin"){ ?><li><a href="users.php">Users <i class="fa fa-users" aria-hidden="true"></i></a></li><?php } else {} ?>
      <li><a href="../" target="_blank">View Site <i class="fa fa-globe" aria-hidden="true"></i></a></li>
    </ul>
  </div>
</div>

<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-green-light">
  <div class="card-body">
    <i class="icon fa fa-list fa-4x"></i>
    <div class="content">
      <div class="title">Jumlah Kategori</div>
	  <?php 
  //menampilkan data mysqli
  date_default_timezone_set('Asia/Jakarta');
  include "koneksi.php";
  $no = 0;
  $modal=mysqli_query($koneksi, "SELECT COUNT(*) AS jum_kat FROM kategori") or die("Error: " . mysqli_error($koneksi));
  $jumkat = mysqli_fetch_array($modal);
  ?>
      <div class="value"><span class="sign"></span><?php echo $jumkat['jum_kat'];?></div>
    </div>
  </div>
</a>

  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-blue-light">
  <div class="card-body">
    <i class="icon fa fa-bolt fa-4x"></i>
    <div class="content">
      <div class="title">Jumlah Material</div>
	  <?php 
  //menampilkan data mysqli
  date_default_timezone_set('Asia/Jakarta');
  include "koneksi.php";
  $no = 0;
  $modal=mysqli_query($koneksi, "SELECT COUNT(*) AS jum_mat FROM material") or die("Error: " . mysqli_error($koneksi));
  $jummat = mysqli_fetch_array($modal);
  ?>
      <div class="value"><span class="sign"></span><?php echo $jummat['jum_mat'];?></div>
    </div>
  </div>
</a>

  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-yellow-light">
  <div class="card-body">
    <i class="icon fa fa-user-plus fa-4x"></i>
    <div class="content">
      <div class="title">Jumlah User</div>
	  <?php 
  //menampilkan data mysqli
  date_default_timezone_set('Asia/Jakarta');
  include "koneksi.php";
  $no = 0;
  $modal=mysqli_query($koneksi, "SELECT COUNT(*) AS jum_us FROM users") or die("Error: " . mysqli_error($koneksi));
  $jumuser = mysqli_fetch_array($modal);
  ?>
      <div class="value"><span class="sign"></span><?php echo $jumuser['jum_us'];?></div>
    </div>
  </div>
</a>

  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card card-mini">
      <div class="card-header">
        <div class="card-title">Material (Stok Kurang dari 30)</div>
       
      </div>
      <div class="card-body no-padding table-responsive">
        <table class="table card-table">
          <thead>
            <tr>
              <th>Material</th>
              <th class="right">Stok</th>
              <th>Status</th>
            </tr>
          </thead>
		  <?php 
  //menampilkan data mysqli
  date_default_timezone_set('Asia/Jakarta');
  include "koneksi.php";
  $no = 0;
  $modal=mysqli_query($koneksi, "SELECT * FROM material WHERE stock < 30") or die("Error: " . mysqli_error($koneksi));
  while($r=mysqli_fetch_array($modal)){
  $no++;   
?>
          <tbody>
            <tr>
              <td><?php echo  $r['nama_barang']; ?></td>
              <td class="right"><?php echo  $r['stock']; ?></td>
              <td><span class="badge badge-warning badge-icon"><i class="fa fa-warning" aria-hidden="true"></i><span>Pending</span></span></td>
            </tr>
			<?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  
</div>
  <footer class="app-footer"> 
  <div class="row">
    <div class="col-xs-12">
      <div class="footer-copyright">
        Copyright © 2016 PT. PLN SEKTOR PEKANBARU Co,Ltd.
      </div>
    </div>
  </div>
</footer>
</div>

  </div>
  
<script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./assets/js/vendor.js"></script>
  <script type="text/javascript" src="./assets/js/app.js"></script>
  <script type="text/javascript">

    $('.logout').click(function(){
       swal({
			title: "Logout!",
			text: "I will close in 5 seconds.",
			timer: 5000,
			type: "success",
			showConfirmButton: false
			});
    });

</script>
</body>

</html>

  



