<?php
require_once "koneksi.php";
if(isset($_POST['delete_submit'])){
$idArr = $_POST['checked_id'];
foreach($idArr as $id){
mysqli_query($koneksi,"DELETE FROM users WHERE username='".$id."'");
} header("Location:users.php?pesan=sukses");
}
?>