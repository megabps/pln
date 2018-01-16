<!--
Author : Aguzrybudy
Created : Selasa, 19-April-2016
Title : Crud Menggunakan Modal Bootsrap
-->
<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db_name = "pln";
	$koneksi = mysqli_connect($host, $user, $pass);
 	mysqli_select_db($koneksi,$db_name) or die ("no database");
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}else{
	
}
	
?>