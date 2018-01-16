
<?php
	include "koneksi.php";
	
	$nama_barang = $_POST['nama_kategori'];
	$no_sap = $_POST['id_kategori'];
	$update=mysqli_query($koneksi,"UPDATE kategori SET nama_kategori = '$nama_barang' WHERE id_kategori = '$no_sap'");
	
	if ($update == FALSE){
		echo "<p>Update Gagal karena:".(mysql_error())."</p>";
		}else{
	header('location:kategori.php');

}
?>