<?php
	include "koneksi.php";
	$no_sap=$_GET['id_kategori'];
	$modal=mysqli_query($koneksi,"Delete FROM kategori WHERE id_kategori=$no_sap");
	if($modal){
		?>
         <script> location.replace("kategori.php"); </script>
         <?php

	}else{
		echo "delete gagal";
	}
	
?>