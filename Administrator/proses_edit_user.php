
<?php
	include "koneksi.php";
	
	$username = $_POST['username'];
	
	$nama = $_POST['nama'];
	$level = $_POST['level'];
	$update=mysqli_query($koneksi,"UPDATE users SET nama = '$nama', level = '$level' WHERE username = '$username'");
	
	if ($update == FALSE){
		echo "<p>Update Gagal karena:".(mysql_error())."</p>";
		}else{
	header('location:users.php');

}
?>