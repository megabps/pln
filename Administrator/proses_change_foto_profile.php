
<?php
	include "koneksi.php";
	$no_sap = $_POST['username'];
	
	$lokasi_file=$_FILES['foto']['tmp_name'];
	$nama_file=$_FILES['foto']['name'];
	move_uploaded_file($lokasi_file,"fotouser/$nama_file");
	$update=mysqli_query($koneksi,"UPDATE users SET foto = '$nama_file' WHERE username = '$no_sap'");
	
	if ($update == FALSE){
		echo "<p>Update Gagal karena:".(mysql_error())."</p>";
		}else{
	header('location:profile.php');

}
?>