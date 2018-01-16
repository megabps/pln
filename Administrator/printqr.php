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

<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<script type="text/javascript">
window.print();
</script>

</head>
<body>



	  
        <div class="card-header">
          <h3>Daftar Material</h3>
        </div>
        <style>
 div {
    -webkit-column-count: 3;
    -moz-column-count: 3;
    column-count: 3;
  }
</style>
        <div class="card-body no-padding">
		
          <table class="table table-striped primary" cellspacing="0" width="100%" border="1">
    <thead>
        <tr>
		
            <th>No</th>
			<th>QR Code</th>
        </tr>
    </thead>
    <tbody>
	<form>
	<?php 
  //menampilkan data mysqli
  date_default_timezone_set('Asia/Jakarta');
  include "koneksi.php";
  $no = 0;
  $modal=mysqli_query($koneksi, "SELECT * FROM material") or die("Error: " . mysqli_error($koneksi));
  while($r=mysqli_fetch_array($modal)){
  $no++;   
 $width = $height = 200;
$url   = urlencode("http://localhost/plnspkb/detailmaterial.php?no_sap=$r[no_sap]");
?>
        <tr>
            
            <td><?php echo $no; ?></td>
      <td><?php echo "<img src=\"http://chart.googleapis.com/chart?chs={$width}x{$height}&cht=qr&chl=$url\" />"; ?> <br> &nbsp &nbsp &nbsp &nbsp <?php echo  $r['nama_barang']; ?> <br> &nbsp &nbsp &nbsp &nbsp <?php echo  $r['no_sap']; ?></td>
        </tr>
		<?php } ?>
    </tbody>

</table>

        </div>
      </div>
    </div>

</body>


</html>

  



