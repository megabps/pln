<?php
	include "koneksi.php";
	$no_sap=$_GET['username'];
	$modal=mysqli_query($koneksi,"Delete FROM users WHERE username='$no_sap'");
	if($modal){
		?>
         <script> location.replace("users.php"); </script>
         <?php

	}else{
		echo "delete gagal";
	}
	
?>