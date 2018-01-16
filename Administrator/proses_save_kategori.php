<!--
Author : Aguzrybudy
Created : Selasa, 19-April-2016
Title : Crud Menggunakan Modal Bootsrap
-->
<?php
include "koneksi.php";

$nama_barang = $_POST['nama_kategori'];


$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM kategori WHERE nama_kategori='$nama_barang'"));
if($cek > 0){
	echo "<script>window.alert('Nama Kategori yang anda masukan sudah ada')
	window.alert('Input data gagal')
    window.location='kategori.php'</script>";
    }else{

$insert=mysqli_query($koneksi,"INSERT INTO kategori VALUES ('','$nama_barang')");
	}
if ($insert == FALSE){
		echo "<p>Inser Gagal karena: ada data ganda</p>";
		}else{
	header('location:kategori.php');

}
?>