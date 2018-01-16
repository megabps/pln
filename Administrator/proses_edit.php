
<?php
	include "koneksi.php";
	$no_sap = $_POST['no_sap'];
	$nama_barang = $_POST['nama_barang'];
	$satuan = $_POST['satuan'];
	$kategori = $_POST['kategori'];
	$stok = $_POST['stok'];
	$lokasi = $_POST['lokasi'];
	
	
	$update=mysqli_query($koneksi,"UPDATE material SET nama_barang = '$nama_barang',satuan = '$satuan',stock = $stok,lokasi = '$lokasi', id_kategori = $kategori WHERE no_sap = '$no_sap'");
	
	if ($update == FALSE){
		echo "<p>Update Gagal karena:".(mysql_error())."</p>";
		}else{
	header('location:index.php');

}
?>