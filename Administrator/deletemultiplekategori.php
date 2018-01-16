<?php
require_once "koneksi.php";
if(isset($_POST['delete_submit'])){
$idArr = $_POST['checked_id'];
foreach($idArr as $id){
mysqli_query($koneksi,"DELETE FROM kategori WHERE id_kategori=".$id);
} header("Location:kategori.php?pesan=sukses");
}
?>