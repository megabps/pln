<?php
  session_start();
  if(!isset($_SESSION['admin'])) {
  header('location:beranda.php'); }
  else { $id = $_SESSION['admin']; }
  require_once("koneksi.php");
  $query = mysqli_query($koneksi,"SELECT * FROM users WHERE username = '$id'");
  $hasil = mysqli_fetch_array($query);
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
<script src="js/jquery.min.js"></script>
    
    <script>
    $(document).ready(function(){
      // Sembunyikan alert validasi kosong
      $("#kosong").hide();
    });
    </script>
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
      <li>
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
	  <li class="active">
        <a href="./profile.php">
          <div class="icon">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
          <div class="title">Profile</div>
        </a>
      </li>
	  <li>
        <a href="./users.php">
          <div class="icon">
            <i class="fa fa-users" aria-hidden="true"></i>
          </div>
          <div class="title">Users</div>
        </a>
      </li>
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
        <li class="navbar-title">Dashboard</li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown profile">
          <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
            <?php if($hasil['level']=="admin"){?>
			<img class="profile-img" src="./assets/images/admin.png">
			<?php } else { ?>
			<img class="profile-img" src="./assets/images/user.png">
			<?php } ?>
            <div class="title">Profile</div>
          </a>
          <div class="dropdown-menu">
            <div class="profile-info">
              <h4 class="username"><?php echo $hasil['nama'];?> (<?php echo $hasil['level'];?>)</h4>
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
    <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body app-heading">
          <img class="profile-img" src="fotouser/<?php echo $hasil['foto'];?>">
          <div class="app-title">
            <div class="title"><span class="highlight"><?php echo $hasil['nama'];?></span></div>
            <div class="description"><?php echo $hasil['level'];?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-tab">
        <div class="card-header">
          <ul class="nav nav-tabs">
            <li role="tab1" class="active">
              <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Profile</a>
            </li>
            <li role="tab3">
              <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Password</a>
            </li>
          </ul>
        </div>
        <div class="card-body no-padding tab-content">
          <div role="tabpanel" class="tab-pane active" id="tab1">
            <div class="row">
              <div class="col-md-3 col-sm-12">
                <div class="section">
                  <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i> Ubah Foto</div>
                  <div class="section-body __indent">
				  <p align="center">
     				<img src="fotouser/<?php echo $hasil['foto'];?>" width="200" height="200" class="img-rounded" />
                    </p>
					
					<form action="proses_change_foto_profile.php" enctype="multipart/form-data" method="POST">
					<div class="form-group" style="padding-bottom: 20px;">
						<label for="Foto">Upload Foto</label>
						<input type="hidden" name="username"  class="form-control" placeholder="No. SAP" required value="<?php echo $hasil['username'];?>" />
					<input type="file" name="foto" value=""   class="form-control" placeholder="Foto" />
					</div>
	                <button class="btn btn-success" type="submit">
	                    Upload
	                </button>
					</form>
				  </div>
                </div>
              </div>
              <div class="col-md-9 col-sm-12">
                <div class="section">
                  <div class="section-title">Data Diri</div>
                  <div class="section-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Username</label>
							<div class="col-md-9">
								<input type="text" class="form-control" placeholder="" value="<?php echo $hasil['username'];?>" disabled>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<label class="control-label">Nama</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" value="<?php echo $hasil['nama'];?>" disabled>
							</div>
						</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="tab3">
            <form action="proses_change_password2.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
               <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Password">Password Lama</label>
                  <input type="hidden" name="username"  class="form-control" holder="No. SAP" required value="<?php echo $hasil['username'];?>"/>
                  <input type="password" name="password"  class="form-control" placeholder="Password" required value="<?php echo $hasil['password'];?>" disabled/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Password">Password Baru</label>
                  
                  <input type="password" name="password_b"  class="form-control" placeholder="Password Baru" required  />
                </div>
				
				<div class="form-group" style="padding-bottom: 20px;">
                  <label for="Password">Konfirmasi Password Baru</label>
                  <input type="password" name="password_c"  class="form-control" placeholder="Konfirmasi Password Baru" required  />
                </div>
				
			
				
	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Change Password
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>

            	</form>
          </div>
        </div>
      </div>
    </div>
  </div>
	</div>
</div>
</div>
	<script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
		<script type="text/javascript" src="./assets/js/vendor.js"></script>
  <script type="text/javascript" src="./assets/js/app.js"></script>
  </body>
</html>