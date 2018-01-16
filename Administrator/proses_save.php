
<?php
include "koneksi.php";
$no_sap = $_POST['no_sap'];
$nama_barang = $_POST['nama_barang'];
$satuan = $_POST['satuan'];
$kategori = $_POST['kategori'];
$stok = $_POST['stok'];
$lokasi = $_POST['lokasi'];
$lokasi_file=$_FILES['foto']['tmp_name'];
$nama_file=$_FILES['foto']['name'];

$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM material WHERE no_sap='$no_sap'"));
if($cek > 0){
	echo "<script>window.alert('No. SAP yang anda masukan sudah ada')
	window.alert('Input data gagal')
    window.location='index.php'</script>";
    }else{
move_uploaded_file($lokasi_file,"foto/$nama_file");
$insert=mysqli_query($koneksi,"INSERT INTO material VALUES ('$no_sap','$nama_barang','$satuan',$stok,'$lokasi','$nama_file',$kategori)");
	}
if ($insert == FALSE){
		echo "<p>Inser Gagal karena: ada data ganda</p>";
		}else{
	header('location:index.php');

}
?>