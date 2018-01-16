
<?php
	include "koneksi.php";
	$no_sap = $_POST['no_sap'];
	
	$lokasi_file=$_FILES['foto']['tmp_name'];
	$nama_file=$_FILES['foto']['name'];
	move_uploaded_file($lokasi_file,"foto/$nama_file");
	$update=mysqli_query($koneksi,"UPDATE material SET gambar = '$nama_file' WHERE no_sap = '$no_sap'");
	
	if ($update == FALSE){
		echo "<p>Update Gagal karena:".(mysql_error())."</p>";
		}else{
	header('location:index.php');

}
?>