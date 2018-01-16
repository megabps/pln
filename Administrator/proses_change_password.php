<html>
<head>
<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
 <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<title>Gudang Material | PT. PLN Sektor Pekanbaru</title>
</head>
<body>
<?php
include "koneksi.php";
$username = $_POST['username'];
$password_b = $_POST['password_b'];
$password_c = $_POST['password_c'];
if($password_b != $password_c)
{
echo "<script type='text/javascript'>
		swal({
			title: 'Gagal Mengganti Password!',
			text: 'Password Baru Harus Sama Dengan Konfirmasi Password.',
			type: 'error',
			showCancelButton: false,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'Back to Users!',
			closeOnConfirm: false,
			closeOnCancel: false
			},
		function(isConfirm){
			if (isConfirm) {
				window.location.href='users.php'
			} 
		});
		
		</script>";

}
else
{
$update=mysqli_query($koneksi,"UPDATE users SET password = MD5('$password_b') WHERE username = '$username'");
if ($update == FALSE){
		echo "<p>Update Gagal karena:".(mysql_error())."</p>";
		}else{
	header('location:users.php');
}
}
?>
</body>
</html>