<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Data Excel</title>

    <!-- Load File bootstrap.min.css yang ada difolder css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Style untuk Loading -->
    <style>
        #loading{
      background: whitesmoke;
      position: absolute;
      top: 140px;
      left: 82px;
      padding: 5px 10px;
      border: 1px solid #ccc;
    }
    </style>
    
    <!-- Load File jquery.min.js yang ada difolder js -->
    <script src="js/jquery.min.js"></script>
    
    <script>
    $(document).ready(function(){
      // Sembunyikan alert validasi kosong
      $("#kosong").hide();
    });
    </script>
  </head>
  <body>
    <!-- Membuat Menu Header / Navbar -->
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;"><b>Import Data Excel</b></a>
        </div>
        
      </div>
    </nav>
    
    <!-- Content -->
    <div style="padding: 0 15px;">
      <!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
      <a href="index.php" class="btn btn-danger pull-right">
        <span class="glyphicon glyphicon-remove"></span> Cancel
      </a>
      
      <h3>Form Import Data</h3>
      <hr>
      
      <!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
      <form method="post" action="" enctype="multipart/form-data">
        <a href="Format.xlsx" class="btn btn-default">
          <span class="glyphicon glyphicon-download"></span>
          Download Format
        </a><br><br>
        
        <!-- 
        -- Buat sebuah input type file
        -- class pull-left berfungsi agar file input berada di sebelah kiri
        -->
        <input type="file" name="file" class="pull-left">
        
        <button type="submit" name="preview" class="btn btn-success btn-sm">
          <span class="glyphicon glyphicon-eye-open"></span> Preview
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
            <th colspan='5' class='text-center'>Preview Data</th>
          </tr>
          <tr>
            
            <th>No. SAP</th>
            <th>Nama Material</th>
			<th>Satuan</th>
			<th>Stok</th>
			<th>Lokasi</th>
     
           
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
            //$date = $row['D']; // Ambil data telepon
            //$alamat = $row['E']; // Ambil data alamat
            
            // Cek jika semua data tidak diisi
            if(empty($nama) && empty($no_sap) && empty($satuan) && empty($stok) && empty($lokasi))
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
              //$date_td = ( ! empty($date))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
              //$alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              
              // Jika salah satu data ada yang kosong
              if(empty($nama) && empty($no_sap) && empty($satuan) && empty($stok) && empty($lokasi)){
                $kosong++; // Tambah 1 variabel $kosong
              }
              
              echo "<tr>";
              //echo "<td".$nis_td.">".$nis."</td>";
			  echo "<td".$nosap_td.">".$no_sap."</td>";
              echo "<td".$nama_td.">".$nama."</td>";
              echo "<td".$satuan_td.">".$satuan."</td>";
			  echo "<td".$stok_td.">".$stok."</td>";
			  echo "<td".$lokasi_td.">".$lokasi."</td>";
              //echo "<td".$date_td.">".$date."</td>";
              //echo "<td".$alamat_td.">".$alamat."</td>";
              echo "</tr>";
            }
            
            $numrow++; // Tambah 1 setiap kali looping
          }
          
          echo "</table>";
          
          // Cek apakah variabel kosong lebih dari 1
          // Jika lebih dari 1, berarti ada data yang masih kosong
          if($kosong > 1){
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
            echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
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
  </body>
</html>