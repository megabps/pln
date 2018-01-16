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
session_start();
require 'koneksi.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);


    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $query = $koneksi->query($sql);

    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();
        $_SESSION['admin'] = $row['username'];
        header("location:index.php");
    } else {
        echo "<script type='text/javascript'>
		swal({
			title: 'Gagal Login!',
			text: 'Username atau Password Salah.',
			type: 'error',
			showCancelButton: false,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'Back to Login!',
			closeOnConfirm: false,
			closeOnCancel: false
			},
		function(isConfirm){
			if (isConfirm) {
				window.location.href='beranda.php'
			} 
		});
		
		</script>";
		
    }
    exit();
}
?>
</body>
</html>