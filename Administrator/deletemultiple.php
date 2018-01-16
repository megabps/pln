<?php
require_once "koneksi.php";
if(isset($_POST['delete_submit'])){
$idArr = $_POST['checked_id'];
foreach($idArr as $id){
mysqli_query($koneksi,"DELETE FROM material WHERE no_sap=".$id);
} header("Location:material.php?pesan=sukses");
}
?>