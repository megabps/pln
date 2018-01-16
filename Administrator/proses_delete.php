<?php
	include "koneksi.php";
	$no_sap=$_GET['no_sap'];
	$modal=mysqli_query($koneksi,"Delete FROM material WHERE no_sap=$no_sap");
	if($modal){
		?>
         <script> location.replace("index.php"); </script>
         <?php

	}else{
		echo "delete gagal";
	}
	
?>