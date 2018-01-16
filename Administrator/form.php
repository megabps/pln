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
      <li class="dropdown active">
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
    
    <!-- Content -->
    <div class="row">
		<div class="col-xs-12">
		 <div class="card">
			<div class="card-header">
				<h3>Form Import Data</h3>
			</div>
	  <div class="card-body no-padding">
      
      <!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
      <form method="post" action="" enctype="multipart/form-data">
        <a href="Format.xlsx" class="btn btn-primary">
          <span class="fa fa-download"></span>
          Download Format
        </a><br><br>
        
        <!-- 
        -- Buat sebuah input type file
        -- class pull-left berfungsi agar file input berada di sebelah kiri
        -->
        <input type="file" name="file" class="form-control">
        
        <button type="submit" name="preview" class="btn btn-success btn-sm">
          <span class="fa fa-eye"></span> Preview
        </button>
      </form>
      
      <hr>
      
      <!-- Buat Preview Data -->
      <?php
      // Jika user telah mengklik tombol Preview
      if(isset($_POST['preview'])){
        //$ip = ; // Ambil IP Address dari User
        $nama_file_baru = 'data.xlsx';
        
        // Cek apakah terdapat file data.xlsx pada folder tmp
        if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
          unlink('tmp/'.$nama_file_baru); // Hapus file tersebut
        
        $tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
        $tmp_file = $_FILES['file']['tmp_name'];
        
        // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
        if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
          // Upload file yang dipilih ke folder tmp
          // dan rename file tersebut menjadi data{ip_address}.xlsx
          // {ip_address} diganti jadi ip address user yang ada di variabel $ip
          // Contoh nama file setelah di rename : data127.0.0.1.xlsx
          move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);
          
          // Load librari PHPExcel nya
          require_once 'PHPExcel/PHPExcel.php';
          
          $excelreader = new PHPExcel_Reader_Excel2007();
          $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
          $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
          
          // Buat sebuah tag form untuk proses import data ke database
          echo "<form method='post' action='import.php'>";
          
          // Buat sebuah div untuk alert validasi kosong
          echo "<div class='alert alert-danger' id='kosong'>
          Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
          </div>";
          
          echo "<table class='table table-bordered'>
          <tr>
            <th colspan='6' class='text-center'>Preview Data</th>
          </tr>
          <tr>
            
            <th>No. SAP</th>
            <th>Nama Material</th>
			<th>Satuan</th>
			<th>Stok</th>
			<th>Lokasi</th>
			<th>ID Kategori</th>
     
           
          </tr>";
          
          $numrow = 1;
          $kosong = 0;
          foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
            // Ambil data pada excel sesuai Kolom
            //$nis = $row['A']; // Ambil data NIS
            $no_sap = $row['A']; // Ambil data nama
            $nama = $row['B']; // Ambil data jenis kelamin
			$satuan = $row['C'];
			$stok = $row['D'];
			$lokasi = $row['E'];
			$id_kategori = $row['F'];
            //$date = $row['D']; // Ambil data telepon
            //$alamat = $row['E']; // Ambil data alamat
            
            // Cek jika semua data tidak diisi
            if(empty($nama) && empty($no_sap) && empty($satuan) && empty($stok) && empty($lokasi) && empty($id_kategori))
              continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
            
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if($numrow > 1){
              // Validasi apakah semua data telah diisi
             // $nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
              $nosap_td = ( ! empty($no_sap))? "" : " style='background: #E07171;'";
			  $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
              $satuan_td = ( ! empty($satuan))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
			  $stok_td = ( ! empty($stok))? "" : " style='background: #E07171;'";
			  $lokasi_td = ( ! empty($lokasi))? "" : " style='background: #E07171;'";
			  $id_kategori_td = ( ! empty($id_kategori))? "" : " style='background: #E07171;'";
              //$date_td = ( ! empty($date))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
              //$alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              
              // Jika salah satu data ada yang kosong
              if(empty($nama) || empty($no_sap) || empty($satuan) || empty($stok) || empty($lokasi) || empty($id_kategori)){
                $kosong++; // Tambah 1 variabel $kosong
              }
              
              echo "<tr>";
              //echo "<td".$nis_td.">".$nis."</td>";
			  echo "<td".$nosap_td.">".$no_sap."</td>";
              echo "<td".$nama_td.">".$nama."</td>";
              echo "<td".$satuan_td.">".$satuan."</td>";
			  echo "<td".$stok_td.">".$stok."</td>";
			  echo "<td".$lokasi_td.">".$lokasi."</td>";
			  echo "<td".$id_kategori_td.">".$id_kategori."</td>";
              //echo "<td".$date_td.">".$date."</td>";
              //echo "<td".$alamat_td.">".$alamat."</td>";
              echo "</tr>";
            }
            
            $numrow++; // Tambah 1 setiap kali looping
          }
          
          echo "</table>";
          
          // Cek apakah variabel kosong lebih dari 1
          // Jika lebih dari 1, berarti ada data yang masih kosong
          if($kosong != 0){
          ?>	
            <script>
            $(document).ready(function(){
              // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
              $("#jumlah_kosong").html('<?php echo $kosong; ?>');
              
              $("#kosong").show(); // Munculkan alert validasi kosong
            });
            </script>
          <?php
          }else{ // Jika semua data sudah diisi
            echo "<hr>";
            
            // Buat sebuah tombol untuk mengimport data ke database
            echo "
			<i>Note : <font color='FF0000'>Pastikan Seluruh Data Pada Setiap Kolom Terisi !!</font></i><br>
			<button type='submit' name='import' class='btn btn-primary'><span class='fa fa-upload'></span> Import</button>";
          }
          
          echo "</form>";
        }else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
          // Munculkan pesan validasi
          echo "<div class='alert alert-danger'>
          Hanya File Excel 2007 (.xlsx) yang diperbolehkan
          </div>";
        }
      }
      ?>
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