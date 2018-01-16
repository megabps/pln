
<?php
include "koneksi.php";
$no_sap = $_POST['username'];
$nama_barang = $_POST['nama'];
$satuan = $_POST['password'];
$kategori = $_POST['level'];


$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM users WHERE username='$no_sap'"));
if($cek > 0){
	echo "<script>window.alert('Username yang anda masukan sudah ada')
	window.alert('Input data gagal')
    window.location='users.php'</script>";
    }else{

$insert=mysqli_query($koneksi,"INSERT INTO users VALUES ('$no_sap',MD5('$satuan'),'$nama_barang','$kategori')");
	}
if ($insert == FALSE){
		echo "<p>Inser Gagal karena: ada data ganda</p>";
		}else{
	header('location:users.php');

}
?>