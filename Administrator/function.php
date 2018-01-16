<?php
include("phpqrcode/qrlib.php");

$tempdir="";
$nosap = $_POST['no_sap'];

	QRcode::png($nosap,$tempdir."qrcode.png",QR_ECLEVEL_L, 6);
	echo json_encode(array('status'=>'ok',));
	
?>